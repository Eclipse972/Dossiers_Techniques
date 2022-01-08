<?php
require"Modele/classe_Page.php";

class Page_association extends Page {
/*	Affiche une page avec titre avec une image qui est un lien vers un fichier
 * C'est le cas des dessins d'ensemble et des éclatés.
 * Les fichiers sont au format edrawing de SolidWorks de préférence
 * */

	private $image;			// nom de l'image à afficher avec son extension
	private $fichier;		// nom du fichier associé à l'image avec son extension

 	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		// image et dossier instanciées dans le constructeur de la classe mère

		// valeurs par défaut
		$this->codeTitre = "Association image-fichier"; // créée dans la classe-mère
		// pas de feuille de style supplémentaire à déclarer
	}

/* ***************************
 * MUTATEURS (SETTER)
 * ***************************/

	// les différents types d'association
	public function setDessinDensemble()	{ $this->codeTitre = "Dessin d&apos;ensemble"; }
	public function setEclate()				{ $this->codeTitre = "&Eacute;clat&eacute;"; }
	// fin de la liste

	public function SetImage($image) {	// défini l'image à afficher
		$this->image = PEUNC\classes\Page::BaliseImage("/Supports/{$this->dossier}images/{$image}", "{$this->codeTitre} {$this->du_support}", 'class="association"');
	}

	public function setFichier($fichier) {	// défini le fichier à télécharger avec recherche d'existence du fichier
		$fichier = "Supports/{$this->dossier}fichiers/{$fichier}";
		$this->fichier = (file_exists($fichier)) ? "/" . $fichier : "#";
	}
/* Le controleur a la structure suivante :
 * <?php
 * $this->setDessinDensemble() ou $this->setEclate() ou ...
 * Remarque: cette manière de faire permet de faire planter php en cas d'erreur de nom
 *
 * this->SetImage(...)
 * this->setFichier(...)
 * */

/* ***************************
 * ASSESSURS (GETTER)
 * ***************************/
	public function getSection() { // redéfinition du code pour afficher la page
		$code = $this->getTitrePage() . "<p style=\"text-align:center\">Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>";
		// création du lien iamge-fichier
		$code .= "<a href={$this->fichier}>{$this->image}</a>\n";
		return $code;
	}
}
