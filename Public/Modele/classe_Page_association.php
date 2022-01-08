<?php
require"Modele/classe_Page.php";

class Page_association extends Page {
/*	Affiche une page avec titre avec une image qui est un lien vers un fichier
 * C'est le cas des dessins d'ensemble et des éclatés.
 * Les fichiers sont au format edrawing de SolidWorks de préférence
 * */

	private $image;			// image à afficher
	private $fichier;		// fichier associé à l'image'
	private $hauteur = 400;	// hauteur de l'image

 	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		// image et dossier instanciées dans le constructeur de la classe mère

		// valeurs par défaut
		$this->codeTitre = "Association image-fichier"; // créée dans la classe-mère
		$this->setCSS(array("pageDT"));
	}
/* Le controleur a la structure suivante :
 * <?php
 * $this->set
 * */

/* ***************************
 * MUTATEURS (SETTER)
 * ***************************/

	// les différents types d'association
	public function setDessinDensemble()	{ $this->codeTitre = "Dessin d&apos;ensemble"; }
	public function setEclate()				{ $this->codeTitre = "&Eacute;clat&eacute;"; }
	// fin de la liste

	public function setHauteur($hauteur)	{ $this->hauteur = $hauteur; }

	public function SetImage($image) {	// défini l'image à afficher
	}

	public function setFichier($fichier) {	// défini le fichier à télécharger avec recherche d'existence du fichier
	}

/* ***************************
 * ASSESSURS (GETTER)
 * ***************************/
	public function getSection() { // redéfinition du code pour afficher la page
		$code = $this->getTitrePage() . "<p>cliquez surl&apos;image pour t&eacute;l&eacute;charger le lichier</p>";
		// création du lien iamge-fichier

		return $code;
	}
}
