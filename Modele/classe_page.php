<?php
class Page_abstraite { // classe servant de modèle  toutes les autres
	private $oSupport;	// objet support
	private $titre;		// de la page

	public __construct($oSupport) {	// transmettre l'objet ou son identifiant?
		$this->oSupport = $oSupport; // doit être valide
	}
	// Assesseurs ---------------------------------------------------------------------------------

	// Mutateurs ----------------------------------------------------------------------------------
	public function Dénommer($titre) { $this->titre = $titre; }

	// autres méthodes ----------------------------------------------------------------------------

	public function Afficher() { // code pour afficher la page
		echo '<h1>'.$this->titre.'</h1>'."\n"; // première instruction commune à toutes les pages
	}
}
/* ************************************************************************************************
 * 	classes filles
 * ************************************************************************************************
*/
class Page_nomenclature extends Page_abstraite {
	public __construct($oSupport){
		parent::__construct($oSupport);
		$this->Dénommer("Nomenclature");
	}
	public function Afficher(){ // code pour afficher la page
		parent::Afficher();
		
	}
	
}

class Page_image extends Page_abstraite { // afiche une unique image avec du texte au dessous/dessous
	public function Afficher(){ // code pour afficher la page
		parent::Afficher();
		
	}
}

// ************************************************************************************************
// association image-fichier
// un certain nombre de pages asocie une image avec un fichier téléchargeable

class Page_association_image_fichier extends Page_abstraite {
	private $image;		// image sans son extension
	private $fichier;	// fichier sans son extension
	
	public __construct($oSupport, $image, $extension_image, $fichier, $extension_fichier) {
		parent::__construct($oSupport);
		
		$this->image = $oSupport->Dossier().'images/'.$image.$extension_image;
		if (!file_exists($this->image))			// si le fichier n'existe pas
			$this->image = 'Vue/pas2photo.png';	// on remplace par l'image pas de photo
		
		$this->fichier = $oSupport->Dossier().'fichiers/'.$fichier.$extension_fichier;
		if (!file_exists($this->fichier))	// si le fichier n'existe pas
			$this->fichier = '#';			// lien vide
	}
	public function Afficher(){ // code pour afficher la page
		parent::Afficher();	// affiche le titre
		echo '<p style="text-align:center">Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>'."\n";
		echo '<a href="'.$this->fichier.'"><img src="'.$this->image.'" '.$supplement.' alt = "'.$altm.'"></a>';
	}
}

class Page_dessin_densemble extends Page_association_image_fichier {
	public __construct($oSupport, $image, $fichier = null) { // image & fichier sans extension
		if (!isset($fichier)) $fichier = $image;	// par défaut les deux fichiers portent le même nom
		parent::__construct($oSupport, $image, '.png', $fichier, '.EDRW');
		$this->Dénommer('Dessin d&apos;ensemble '.$oSupport->Du_support());
	}
	
	public function Afficher() { parent::Afficher(); }	// code pour afficher la page
}

class Page_éclaté extends Page_association_image_fichier {
	public __construct($oSupport, $image, $fichier = null) { // image & fichier sans extension
		if (!isset($fichier)) $fichier = $image;	// par défaut les deux fichiers portent le même nom
		parent::__construct($oSupport, $image, '.png', $fichier, '.EASM');
		$this->Dénommer('&Egrave;clat&egrave; '.$oSupport->Du_support());
	}

	public function Afficher(){ // code pour afficher la page
		parent::Afficher();	
	}
}

class Page_classe_equivalence extends Page_association_image_fichier {
	public function Afficher(){ // code pour afficher la page
		parent::Afficher();
		
	}
}

class Page_dessin_définition extends Page_association_image_fichier {
	public function Afficher(){ // code pour afficher la page
		parent::Afficher();
		
	}
}


