<?php

class Page_association extends Page
{
/*	Affiche une page avec titre avec une image qui est un lien vers un fichier
 * C'est le cas des dessins d'ensemble et des éclatés.
 * Les fichiers sont au format edrawing de SolidWorks de préférence
 * */

	protected $image	= null;	// nom de l'image à afficher sans son extension
	protected $fichier	= null;	// nom du fichier associé à l'image sans son extension
	protected $extension;		// extension du fichier
	protected $commentaireHTML;	// code html du commentaire ajouté en dessous de l'image

 	public function __construct(PEUNC\HttpRoute $route, array $TparamURL = [])
 	{
		parent::__construct($route, $TparamURL);
		// image et dossier instanciées dans le constructeur de la classe mère

		// valeurs par défaut
		$this->codeTitre = "Association image-fichier"; // créée dans la classe-mère
		$this->commentaireHTML = null;
		// pas de feuille de style supplémentaire à déclarer
	}

/* ***************************
 * MUTATEURS (SETTER)
 * ***************************/

	// Les fichiers sont des fichiers eDrawing.
	public function setPiece($titre)
	{
		$this->setTitreAssociation($titre);
		$this->commentaireHTML = "<p>Piece</p>";
		$this->extension = "EPRT";
	}

	public function setAssemblage($titre)
	{
		$this->setTitreAssociation($titre);
		$this->commentaireHTML = "<p style=\"text-align:center\">Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src=\"/images/icone_eclater_rassembler.png\" alt = \"icone\"> pour &eacute;clater/rassembler la maquette num&eacute;rique</p>";
		$this->extension = "EASM";
	}

	public function setMiseEnPlan($titre)
	{
		$this->setTitreAssociation($titre);
		$this->commentaireHTML = "<p>Mise en plan</p>";
		$this->extension = "EDRW";
	}
	// fin des types d'association

	public function setTitreAssociation($titre = null) { $this->codeTitre = isset($titre) ? $titre : ""; }

	public function SetImage($image)
	{
		$this->image = $image;
		if (!isset($this->fichier))	$this->fichier = $this->image;
	}
		
	public function setFichier($fichier)
	{
		$this->fichier = $fichier;
		if (!isset($this->image))	$this->image = $this->fichier;
	}

	public function setCommentaire($commentaire) { $this->commentaireHTML = $commentaire; }

/* Le controleur a la structure suivante :
 * <?php
 * $this->setMiseEnPlan("Dessin d&apos;ensemble") ou $this->setAssemblage("&Eacute;clat&eacute;") ou ...
 * Remarque: cette manière de faire permet de faire planter php en cas d'erreur de nom
 *
 * this->SetImage(...)
 * this->setFichier(...)
 * */

/* ***************************
 * ASSESSURS (GETTER)
 * ***************************/
	public function getSection() // code pour afficher la page
	{
		// recherche de l'image
		$this->image = PEUNC\Page::BaliseImage("/Supports/{$this->dossier}images/{$this->image}.png", "{$this->codeTitre} {$this->du_support}", 'class="association"');

		// recherche du fichier
		$fichier = "Supports/{$this->dossier}fichiers/{$this->fichier}.{$this->extension}";
		$this->fichier = (file_exists($fichier)) ? "/" . $fichier : "#";
		
		return	$this->getTitrePage()	// titre de la page
			.	"<a href=\"{$this->fichier}\" title=\"T&eacute;l&eacute;charger le fichier\">{$this->image}</a>\n"	// image est un lien avec un commentaire
			.	(isset($this->commentaireHTML) ? $this->commentaireHTML : "");	// éventuel commentaire sous l'image
	}
}
