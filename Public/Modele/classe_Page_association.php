<?php
require"Modele/classe_Page.php";

class Page_association extends Page {
/*	Affiche une page avec titre avec une image qui est un lien vers un fichier
 * C'est le cas des dessins d'ensemble et des éclatés.
 * Les fichiers sont au format edrawing de SolidWorks de préférence
 * */

	private $image;		// image à afficher
	private $fichier;	// fichier associé à l'image'
	private $type;		// type d'asociation: dessin d'ensemble, éclaté, ...

 	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		// image et dossier instanciées dans le constructeur de la classe mère

		// valeurs par défaut
		$this->setCSS(array("pageDT"));
	}
/* Le controleur a la structure suivante :
 * <?php
 * $this->set
 * */

/* ***************************
 * MUTATEURS (SETTER)
 * ***************************/

/* ***************************
 * ASSESSURS (GETTER)
 * ***************************/

}
