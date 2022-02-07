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
 * (-1;code;0) -> page d'erreur avec son code
 * (-2;0;0) -> formulaire de contact
 *
 * Les pages d'erreur serveur gérées sont: 404,403 et 500 mais on peut en rajouter facilement d'autres
 * Si la page n'est pas trouvée quelqu'en soit la raison la réponse sera la page 404.
*/
{
	// position dans l'arborescence
	private $alpha;
	private $beta;
	private $gamma;
	private $ID = null;	// ID du noeud

	private $methode;	// méthode Http

	// pour le futur
	private $IP;

	public function __construct()
	{
		global $BD;	// défini dans index.php
		$this->methode = $_SERVER['REQUEST_METHOD'];

		// recherche de la position dans l'arborescence stockée en BD
		$codeRedirecion = $_SERVER['REDIRECT_STATUS'];
		switch($codeRedirecion)
		{	// Toutes les erreurs serveur sont traitées ici via le script index.php. Cf .htaccess
			case 403:	// accès interdit
			case 500:	// erreur serveur
				list($alpha, $beta, $gamma) = [-1, $codeRedirecion, 0];
				break;
			case 200:	// le script est lancé sans redirection
				if (empty($_POST))
					$alpha = $beta = $gamma	= 0;	// un appel ordinaire vers la page d'accueil
				else	// récupération l'emplacement de ce formumaire dans l'arborescence sauvegardé préalablement dans la session
					list($alpha, $beta, $gamma) = Formulaire::DonnerPosition();
				break;
			case 404:	// Ma source d'inspiration: http://urlrewriting.fr/tutoriel-urlrewriting-sans-moteur-rewrite.htm Merci à son auteur
				list($URL, $reste) = explode("?", $_SERVER['REQUEST_URI'], 2);

				// interrogation de la BD pour retrouver la position dans l'arborescence
				$Treponse = $BD->ResultatSQL("SELECT niveau1, niveau2, niveau3 FROM Vue_Routes WHERE URL = ? and methodeHttp = ?", [$URL, $this->methode]);
				if (isset($Treponse["niveau1"]))	// l'URL existe?
				{	// la page existe
					header("Status: 200 OK", false, 200);		// modification pour dire au navigateur que tout va bien finalement
					$alpha	= $Treponse["niveau1"];
					$beta	= $Treponse["niveau2"];
					$gamma	= $Treponse["niveau3"];
				}
				else	// erreur 404!
					list($alpha, $beta, $gamma) = [-1, 404, 0];
				break;
			default:
				list($alpha, $beta, $gamma) = [-1, 0, 0];	// erreur inconnue
		}
		// la position dans l'arborescence
		list($this->alpha, $this->beta, $this->gamma) = [$alpha, $beta, $gamma];

		// recherche de l'ID du noeud
		$this->ID = $BD->ResultatSQL("SELECT ID FROM Vue_Routes WHERE alpha = ? AND beta = ? AND gamma = ? AND methodeHttp = ?", [$alpha, $beta, $gamma, $this->methode]);;

		// Remarque: la méthode est déjà identifiée au début de la fonction
	}

//	Accesseurs ================================================================================================================================
	public function getID()		{ return $this->ID; }
	public function getAlpha()	{ return $this->alpha; }
	public function getBeta()	{ return $this->beta; }
	public function getGamma()	{ return $this->gamma; }
	public function getMethode(){ return $this->methode; }
}
