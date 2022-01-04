<?php
require"Modele/Classe_Page.php";

class Page_image extends Page {
/* Certaine pages sont composées de trois éléments:
 * un titre
 * une image
 * un commentaire qui peut être au dessus ou en dessous de l'image.
 *
*/
	private $commentaire;	// texte aui accompagne l'image'
	private $Audessus;		// booléen indiquant si le commentaire est affiché au dessus de l'image
 	private $image;			// chemin d'accès à l'image
 	private $hauteur;		// hauteur de l'imahe
	private $alt;			// texte alternatif pour l'image

	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		// valeurs par défaut
		$this->dossier = "";	// variable-membre héritée de PEUNC
		$this->image ="";
		$this->commentaire = "image";
		$this->Audessus = false;	// l'image est au dessus?
		$this->hauteur = 400;
		$this->alt = "image";
		// pas de feuille CSS supplémentaire à déclarer
	}
/* ***************************
 * MUTATEURS (SETTER)
 * ***************************
 */
	public function setImage($image, $alt)		{ $this->image = $image;	$this->alt = $alt; }

	public function setAudessus($bool = true)	{ $this->Audessus = $bool; }

	public function setHauteur($hauteur)		{ $this->hauteur = $hauteur; }
 /* Le controleur a la structure suivante :
 * <?php
 * $this->setTitrePage(texte)
 * $this->setDossier(dossier associé à la page)
 * $this->setImage(chemin vers l'image, texte alternatif);
 * $this->setAudessus(booléen pour indiquer où se trouve l'image. Par défaut la valeur est vraie);
 * $this->setHauteur(hauteur de l'image en px)
 * */

/* ***************************
 * ASSESSURS (GETTER)
 * ***************************/

	public function getSection() { // redéfinition du code pour afficher la page
		$code = $this->getTitrePage();
		$commentaire = "<p>{$this->commentaire}</p>\n";
		$image = \PEUNC\classes\Page::BaliseImage($this->image, $this->alt, "height={$this->hauteur}px class=association");
		$code .= ($this->Audessus) ? $image . $commentaire : $commentaire . $image;
		return $code;
	}
}
