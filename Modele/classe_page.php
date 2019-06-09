<?php

// le fichier classe_association doit être chargé au préalable

class Page_abstraite { // classe servant de modèle  toutes les autres
	private $titre;		// de la page
	// Mutateurs ----------------------------------------------------------------------------------
	public function Dénommer($titre) { $this->titre = $titre; }

	// autres méthodes ----------------------------------------------------------------------------
	public function Afficher() { // code pour afficher la page
		echo "\t".'<h1>'.$this->titre.'</h1>'."\n"; // première instruction commune à toutes les pages
	}
	public function Dossier() // dossier de travail de la page
		{ return unserialize($_SESSION['support'])->Dossier(); }
}


/* ************************************************************************************************
 * 	classes filles non utilisées directement. Elles servent de mère à d'autres classes.
 * ************************************************************************************************
*/
class Page_image extends Page_abstraite {
	private $image;
	private $commentaire;
	private $Audessus;
	
	public function __construct($titre, $image, $commentaire, $Audessus, $hauteur = 400) { // page composée d'une image avec un commentaire au dessus ou au dessous
		$this->Dénommer($titre);
		$dossier = $this->Dossier().'images/';
		$this->image = new Image($image, $dossier);
		$this->commentaire = $commentaire;
		$this->Audessus = $Audessus;
		$this->hauteur = $hauteur;
	}
	
	public function Afficher() { // code pour afficher la page
		parent::Afficher();	// affiche le titre
		$commentaire = '<p>'.$this->commentaire.'</p>';
		if (!$this->Audessus) echo $commentaire;
		echo $this->image->Balise('', 'class="association" style=height:'.$this->hauteur.'px;');
		if ($this->Audessus) echo $commentaire;
	}
}

class Page_association_image_fichier extends Page_abstraite { // cette classe n'est pas utilisée directement
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
 * Classes de pages prédéfines, utilisées dans le site.
 * Toutes ces classes sont hydratées à l'aide de la BD lors de la construction de l'objet
 * 
 * Utilisation: le même code quelque soit la page
 * $page = new page(Tableau contenant les paramètres) pour la création et hydratation de la page.
 * $page->Afficher() pour l'affichage sans paramètres 
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

class Page_script extends Page_abstraite {
	private $script;

	public function __construct($Tparam) { // le script sans son extension
		$this->script = $this->Dossier().$Tparam['script'].'.php';		
		if (!file_exists($this->script)) 
		 $this->script = 'Vue/oups.php';
	}
	
	public function Afficher() {
		/* variable pour automatiser l'écriture du dossier d'images. 
		 * Il suffit d'ajouter <?=$Dossier_images?> avant le nom de l'image */
		$Dossier_images = $this->Dossier().'images/'; 
		include $this->script;	// code pour afficher la page
	}	
}

class Page_dessin_densemble extends Page_association_image_fichier {
	public function __construct($Tparam) { // image & fichier sans extension
		// paramètres: $image, $fichier
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], '.EDRW');
		$this->Dénommer('Dessin d&apos;ensemble');
	}
}

class Page_dessin2définition extends Page_association_image_fichier {
	public function __construct($Tparam) { // image & fichier sans extension
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], '.EDRW');
		$this->Dénommer('Dessin de d&eacute;finition '.$Tparam['titre']);
	}
}

class Page_éclaté extends Page_association_image_fichier {
	public function __construct($Tparam) { // image & fichier sans extension
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], '.EASM');
		$this->Dénommer('&Eacute;clat&eacute;');
	}
	public function Afficher() {
		parent::Afficher('Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique');
	}
}

class Page_CE extends Page_association_image_fichier {
	private $EstAssemblage;
	
	public function __construct($Tparam) {
												// extension obligatoire car il existe des CE n'ayant qu'un pièce => extension = .EPRT
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], $Tparam['extension']); // image et fichier doivent porter le même nom
		$this->Dénommer('Classe d&apos;&eacute;quivalence: '.$Tparam['nom_CE']);
		$this->EstAssemblage = ($Tparam['extension'] == '.EASM');
	}
	public function Afficher() {
		parent::Afficher(($this->EstAssemblage) ? 
			'Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique' :
			'Cette classe d&apos;&eacute;quivalence est compos&eacute;e d&apos;une seule pi&egrave;ce');
	}
}

class Page_association extends Page_association_image_fichier {
	private $commentaire;
	
	public function __construct($Tparam) { // image & fichier sans extension
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], $Tparam['extension']);
		$this->Dénommer($Tparam['titre']);
		$this->commentaire = ($Tparam['commentaire']);
	}
	public function Afficher() {
		parent::Afficher($this->commentaire);
	}
}

class Page_image_dessus extends Page_image {
	public function __construct($Tparam)
		{ parent::__construct($Tparam['titre'], $Tparam['image'], $Tparam['commentaire'], true, $Tparam['hauteur']); }
}

class Page_image_dessous extends Page_image {
	public function __construct($Tparam)
		{ parent::__construct($Tparam['titre'], $Tparam['image'], $Tparam['commentaire'], false, $Tparam['hauteur']); }
}

