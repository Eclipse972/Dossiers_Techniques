<?php
namespace PEUNC;

class HttpRouter
/*
 * Cette classe décode une requête http et renvoie :
 * 		- la position dans l'arborescence même s'il s'agit d'une erreur serveur
 *		- la méthode Http utilisée
 *
 * La position dans l'arborescence. Elle est représentée par un triplet (alpha, beta, gamma) par importance décroissante
 * Si alpha >= 0 => pages du site
 * (X;0;0) => page de 1er niveau. 	(0;0;0) -> page d'accueil.
 * (X;Y;0) avec Y>0 => page de 2e niveau
 * (X;Y;Z) avec Z>0 => page de 3e niveau
 *
 * si alpha < 0 => page spéciales PEUNC ou autre
 * (-1;code;0) -> page d'erreur avec son code que ce soit un erreur serveur ou une erreur interne à l'application
 * (-2;0;0) -> formulaire de contact. Mais ce n'est pas une obligation
 *
 * Les pages d'erreur serveur gérées sont: 404, 403, 405 et 500 mais on peut en rajouter facilement d'autres.
 * Si la page n'est pas trouvée quelqu'en soit la raison la réponse sera la page 404.
*/
{
	// position dans l'arborescence
	private $alpha;
	private $beta;
	private $gamma;
	private $ID;		// ID du noeud
	private $methode;	// méthode Http

	// pour le futur
	private $IP;

	public function __construct()
	{
		// recherche de la position dans l'arborescence stockée en BD
		switch($_SERVER['REDIRECT_STATUS'])
		{	// Toutes les erreurs serveur sont traitées ici via le script index.php. Cf .htaccess
			case 403:	// accès interdit
			case 405:	// méthode http non permise
			case 500:	// erreur serveur
				list($this->alpha, $this->beta, $this->gamma) = [-1, $_SERVER['REDIRECT_STATUS'], 0];
				break;
			case 200:	// le script est lancé sans redirection
				list($this->alpha, $this->beta, $this->gamma) = HttpRouter::SansRedirection();
				break;
			case 404:
				list($this->alpha, $this->beta, $this->gamma) = HttpRouter::Redirection404();
				break;
			default:
				list($this->alpha, $this->beta, $this->gamma) = [-1, 0, 0];	// erreur inconnue
		}

		// recherche de l'ID du noeud
		$this->ID = BDD::SELECT("ID FROM Vue_Routes WHERE niveau1 = ? AND niveau2 = ? AND niveau3 = ? AND methodeHttp = ?",
														[$this->alpha, $this->beta, $this->gamma, $_SERVER['REQUEST_METHOD']]);
		$this->methode = $_SERVER['REQUEST_METHOD'];
	}

//	Gestion des redirections ==================================================================================================================

	private static function Redirection404()
	/* Ce script est appelé suite à une erreur 404. C'est cette redirection que j'exploite pour gérer ma pseudo-réécriture d'URL.
	 * Ma source d'inspiration: http://urlrewriting.fr/tutoriel-urlrewriting-sans-moteur-rewrite.htm Merci à son auteur.
	 *
	 * À partir d'une URL, Cette fonction renvoie la position dans l'arborescence du  site.
	 *
	 * Résultat: le triplet (alpha, beta, gamma) sous la forme d'un tableau
	 * */
	{
		list($URL, $reste) = explode("?", $_SERVER['REQUEST_URI'], 2);

		// interrogation de la BD pour retrouver la position dans l'arborescence
		$Treponse = BDD::SELECT("niveau1, niveau2, niveau3 FROM Vue_Routes WHERE URL = ? and methodeHttp = ?", [$URL, $_SERVER['REQUEST_METHOD']]);
		if (isset($Treponse["niveau1"]))	// l'URL existe?
		{	// la page existe
			header("Status: 200 OK", false, 200);	// modification pour dire au navigateur que tout va bien finalement
			return array($Treponse["niveau1"], $Treponse["niveau2"], $Treponse["niveau3"]);
		}
		elseif (BDD::SELECT("count(*) FROM Vue_Routes WHERE URL = ?", [$URL]) > 0)	// au moins un noeud pour cet URL
			return [-1, 405, 0];	// erreur 405!
		else
			return [-1, 404, 0];	// erreur 404!
	}

	private static function SansRedirection()
	/* Un appel direct de index.php.
	 * La pseudo réécriture d'URL ne fonctionne pas avec le script action du formulaire. J'ai le parti de repasser par index.php pour traiter
	 * tous les formulaires. Chaque formulaire doit sauvegarder sa position dans la session pour être retrouvé.
	 * */
	{
		switch($_SERVER['REQUEST_METHOD'])
		{
			case"GET":
				return [0, 0, 0];	// un appel ordinaire vers la page d'accueil
				break;
			case"POST":
				return Formulaire::DonnerPosition();
				break;
			default:
				return [-1, 405, 0];	// erreur 405!
		}
	}

//	Accesseurs ================================================================================================================================

	public function getID()		{ return $this->ID; }
	public function getAlpha()	{ return $this->alpha; }
	public function getBeta()	{ return $this->beta; }
	public function getGamma()	{ return $this->gamma; }
	public function getMethode(){ return $this->methode; }
}
