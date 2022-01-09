<?php
require"Modele/classe_Page.php";

class Page_image extends Page {
/* Certaine pages sont composées de trois éléments:
 * un titre
 * une image
 * un commentaire qui peut être au dessus ou en dessous de l'image.
 *
*/
	protected $commentaire;	// texte aui accompagne l'image'
	protected $Audessus;		// booléen indiquant si le commentaire est affiché au dessus de l'image
 	protected $image;			// chemin d'accès à l'image''
 	protected $hauteur;		// hauteur de l'imahe
	protected $alt;			// texte alternatif pour l'image

	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		// image et dossier instanciées dans le constructeur de la clase mère

		// valeurs par défaut
		$this->commentaire = "image";
		$this->Audessus = false;	// l'image est au dessus?
		$this->hauteur = 400;
		$this->alt = $this->codeTitre;	// défini dans le constructeur de la classe-mère
		// pas de feuille de style supplémentaire à déclarer
	}
/* ***************************
 * MUTATEURS (SETTER)
 * ***************************
 */
	public function setAlt($alt)				{ $this->alt = $alt; }

	public function setAudessus($bool = true)	{ $this->Audessus = $bool; }

	public function setImage($image)			{ $this->image = $image; }

	public function setHauteur($hauteur)		{ $this->hauteur = $hauteur; }

	public function setCommentaire($code = "")	{ $this->commentaire = $code; }
 /* Le controleur a la structure suivante :
 * <?php
 * $this->setTitrePage(texte); // si on souhaite changer la valeur par défaut créée lors de l'hydratation de la page
 * $this->setDossier(dossier associé à la page) // idem
 * // image créée lors de la construction
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
