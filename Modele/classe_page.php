<?php

// le fichier classe_association doit être chargé au préalable

class Page_abstraite { // classe servant de modèle  toutes les autres
	private $titre;		// de la page

	// Assesseurs ---------------------------------------------------------------------------------

	// Mutateurs ----------------------------------------------------------------------------------
	public function Dénommer($titre) { $this->titre = $titre; }

	// autres méthodes ----------------------------------------------------------------------------
	public function Afficher() { // code pour afficher la page
		echo "\t".'<h1>'.$this->titre.'</h1>'."\n"; // première instruction commune à toutes les pages
	}
	public function Dossier() { return unserialize($_SESSION['support'])->Dossier(); }
}
/* ************************************************************************************************
 * 	classes filles
 * ************************************************************************************************
*/
class Page_nomenclature extends Page_abstraite {
	private $nomenclature;
	
	public function __construct(){
		$this->Dénommer('Nomenclature');
		$oSupport = unserialize($_SESSION['support']);
		$BD = new base2donnees();
		$this->nomenclature = $BD->Nomenclature($oSupport->Id());
	}
	public function Afficher() { // code pour afficher la page
		parent::Afficher();
		?>
		<p>Cliquez sur l&apos;image de la pi&egrave;ce pour la t&eacute;l&eacute;charger au format eDrawing.</p>
		<p>Cliquez sur le nom de la mati&egrave;re pour trouver sa défition sur wikip&eacute;dia dans un nouvel onglet.</p>

		<table id="nomenclature">
		<thead>
		<tr>
		<th>Rep</th>
		<th>Image</th>
		<th>D&eacute;signation (x quantit&eacute;)</th>
		<th>Mati&egrave;re</th>
		<th>Observations</th>
		</tr>
		</thead>

		<tbody>
		<?php
		if (isset($this->nomenclature))
			foreach ($this->nomenclature as $piece) echo $piece->Code();
		else trigger_error('Nomenclature inexistante', E_USER_WARNING);
		?>
		</tbody>
		</table>
		<p>Attention: les images ne sont pas &agrave; l&apos;&eacute;chelle.</p>
		<?php
	}
}

class Page_script extends Page_abstraite { // page chargeant une page de code
	private $script;

	public function __construct($script) {
		$oSupport = unserialize($_SESSION['support']);
		$this->script = (file_exists($oSupport->Dossier().$script)) ? $oSupport->Dossier().$script : 'Vue/oups.php';
	}

	public function Afficher() { include $this->script; }	// code pour afficher la page
}

class Page_image extends Page_abstraite {
	private $image;
	
	public function __construct($image) { // affiche une image avec un commentaire au dessus ou au dessous
		$dossier = $this->Dossier().'images/';
		$this->image = new Image($image, $dossier);
	}
	public function Afficher($commentaire, $Audessus = true, $hauteur = 400) { // code pour afficher la page
		parent::Afficher();	// affiche le titre
		$commentaire = '<p>'.$commentaire.'</p>';
		if (!$Audessus) echo $commentaire;
		echo $this->image->Balise('', 'class="association" style=height:'.$hauteur.'px;');
		if ($Audessus) echo $commentaire;
	}
}

class Page_association_image_fichier extends Page_abstraite {
	private $oAssociation;	// objet association image-fichier

	public function __construct($image, $extension_image, $fichier, $extension_fichier) {
		$dossier = $this->Dossier();

		if (!isset($fichier)) $fichier = $image; // par défaut les deux fichiers portent le même nom
		$this->oAssociation = new Association_image_fichier($dossier, $image.$extension_image , $fichier.$extension_fichier);
	}
	public function Afficher($commentaire = null) { // code pour afficher la page
		parent::Afficher();	// affiche le titre
		echo $this->oAssociation->Code($commentaire);
	}
}

/* ************************************************************************************************
 * 	classes petites-filles
 * ************************************************************************************************
*/
class Page_dessin_densemble extends Page_association_image_fichier {
	public function __construct($image, $fichier = null) { // image & fichier sans extension
		parent::__construct($image, '.png', $fichier, '.EDRW');
		$this->Dénommer('Dessin d&apos;ensemble');
	}
}

class Page_dessin2définition extends Page_association_image_fichier {
	public function __construct($titre, $image, $fichier = null) { // image & fichier sans extension
		parent::__construct($image, '.png', $fichier, '.EDRW');
		$this->Dénommer('Dessin de d&eacute;finition '.$titre);
	}
}

class Page_éclaté extends Page_association_image_fichier {
	public function __construct($image, $fichier = null) { // image & fichier sans extension
		parent::__construct($image, '.png', $fichier, '.EASM');
		$this->Dénommer('&Eacute;clat&eacute;');
	}
	public function Afficher() {
		parent::Afficher('Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique');
	}
}

class Page_CE extends Page_association_image_fichier {
	private $EstAssemblage;
	
	public function __construct($nom_CE, $fichier, $extension) {
												// extension obligatoire car il existe des CE n'ayant qu'un pièce => extension = .EPRT
		parent::__construct($fichier, '.png', $fichier, $extension); // image et fichier doivent porter le même nom
		$this->Dénommer('Classe d&apos;&eacute;quivalence: '.$nom_CE);
		$this->EstAssemblage = ($extension == '.EASM');
	}
	public function Afficher() {
		parent::Afficher(($this->EstAssemblage) ? 
			'Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique' :
			'Cette classe d&apos;&eacute;quivalence est compos&eacute;e d&apos;une seule pi&egrave;ce');
	}
}

class Page_image_dessus extends Page_image {
	public function __construct($image)
		{ parent::__construct($image); }
	
	public function Afficher($commentaire, $hauteur = 400)
		{ parent::Afficher($commentaire, true, $hauteur); }
}

class Page_image_dessous extends Page_image {
	public function __construct($image)
		{ parent::__construct($image); }
	
	public function Afficher($commentaire, $hauteur = 400)
		{ parent::Afficher($commentaire, false, $hauteur); }
}

