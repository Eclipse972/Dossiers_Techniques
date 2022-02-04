<?php	// requête http
namespace PEUNC;

require_once 'PEUNC/classes/BDD.php';

class HttpRequest {
	// position
	private $alpha;
	private $beta;
	private $gamma;

	// pour le futur
	private $methode;
	private $Tparam;
	private $IP;

	public function __construct()
	{
		$BD = new PEUNC\BDD;
		$codeRedirecion = $_SERVER['REDIRECT_STATUS'];
		switch($codeRedirecion)
		{	// Toutes les erreurs serveur renvoient ici. Cf .htaccess
			case 403:	// accès interdit
			case 500:	// erreur serveur
				list($this->alpha, $this->beta, $this->gamma) = [-1, $codeRedirecion, 0];	break;
			case 200:	// le script est lancé sans redirection
				if(empty($_POST)) { // c'est la page d'accueil
					$this->alpha = 0;
				} else {	// traitement de formulaire de contact
					$this->alpha = -2;
				}
				$this->beta = $this->gamma	= 0;
				break;
			case 404:	// Ma source d'inspiration: http://urlrewriting.fr/tutoriel-urlrewriting-sans-moteur-rewrite.htm Merci à son auteur
				list($URL, $paramPage, $problem) = explode("?", $_SERVER['REQUEST_URI'], 3);
				if(isset($problem))	throw new Exception("format URL incorrect");
				list($this->alpha, $this->beta, $this->gamma) = $BD->CherchePosition($URL);	// compare avec toutes les URL valides du site
				if (isset($this->alpha))	{	// adresse valide, on ne touche à rien
					header("Status: 200 OK", false, 200);	// modification pour dire au navigateur que tout va bien finalement
				} else	list($this->alpha, $this->beta, $this->gamma) = [-1, 404, 0];	// l'adresse invalide reste affichée dans la barre d'adresse'
				break;
			default:
				list($this->alpha, $this->beta, $this->gamma) = [-1, 0, 0];	// erreur inconnue
		}
	}

//	Accesseurs ================================================================================================================================
	public function getAlpha()	{ return $this->alpha; }
	public function getBeta()	{ return $this->beta; }
	public function getGamma()	{ return $this->gamma; }
}
