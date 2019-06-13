<?php

// le fichier classe_association doit être chargé au préalable

class Page_abstraite { // classe servant de modèle  toutes les autres
	private $titre;		// de la page
	// Mutateurs ----------------------------------------------------------------------------------
	public function Dénommer($titre) { $this->titre = $titre; }

	// autres méthodes ----------------------------------------------------------------------------
	public function Afficher() { // code pour afficher la page
		echo '<h1>'.$this->titre.'</h1>'."\n"; // première instruction commune à toutes les pages
	}
	public function Dossier() // dossier de travail de la page
		{ return $_SESSION['support']->Dossier(); }
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
		echo $this->image->Balise('', 'style="height:'.$this->hauteur.'px; align=center"');
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
		echo '<p style="text-align:center">Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>'."\n";	// message
		echo $this->oAssociation->Associer('cliquez pour télécharger', 'class="association"');
		if (isset($commentaire)) 
			echo'<p style="text-align:center">'.$commentaire.'</p>'."\n";	// commentaire éventuel sous l'image
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
	private $colonne_matière;
	private $colonne_observation;
	
	public function __construct(){
		$this->Dénommer('Nomenclature');
		$BD = new base2donnees();
		$this->nomenclature = $BD->Nomenclature();
		
		//affichage des deux dernières colonnes si non vides
		$this->colonne_matière = !$BD->Colonne_matiere_vide();
		$this->colonne_observation = !$BD->Colonne_observation_vide();
	}
	public function Afficher() { // code pour afficher la page
		parent::Afficher();
		// indentation à cause de l'affichage du code source de la page
?>
<p>Cliquez sur l&apos;image de la pi&egrave;ce pour la t&eacute;l&eacute;charger au format eDrawing.</p>
<p>Cliquez sur le nom de la mati&egrave;re pour trouver sa défition sur wikip&eacute;dia dans un nouvel onglet.</p>
<table id="nomenclature">
<thead>
<tr>
<th>Rep</th>
<th>Image</th>
<th>D&eacute;signation (x quantit&eacute;)</th>
<?php
		if ($this->colonne_matière) echo "<th>Mati&egrave;re</th>\n";
		if ($this->colonne_observation) echo "<th>Observations</th>\n";
?>
</tr>
</thead>

<tbody>
<?php
		if (isset($this->nomenclature))
			foreach ($this->nomenclature as $piece)
				echo $piece->Code($this->colonne_matière, $this->colonne_observation);
		else trigger_error('Nomenclature inexistante', E_USER_WARNING);
?>
</tbody>
</table>
<p>Attention: les images ne sont pas &agrave; l&apos;&eacute;chelle.</p>
<?php
	} // fin de Afficher()
}

class Page_script extends Page_abstraite {
	private $script;

	public function __construct($Tparam) { $this->script = $this->Dossier().$Tparam['script'].'.php'; }
	
	public function Afficher() {
		if (file_exists($this->script)) {
			/* variable pour automatiser l'écriture du dossier d'images. 
			 * Il suffit d'ajouter <?=$Dossier_images?> avant le nom de l'image */
			$Dossier_images = $this->Dossier().'images/'; 
			include $this->script;	// code pour afficher la page
		} else {	
?>
	<div id="page_image">
	<h1>D&eacute;sol&eacute; !</h1>
	<p align=center>Il semblerai que je n&apos;ai pas r&eacute;dig&eacute; cette page.</p>
	<?=$_SESSION['support']->Image()?>
	</div>
<?php
		}
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

class Page_courbe extends Page_abstraite { // page contenant une courebe avec/sans tableau de valeurs
	private $courbe;
	private $tableau;
	private $alt_tableau;
	private $alt_courbe;
	private $hauteur;
	
	public function __construct($Tparam) {
		$this->Dénommer($Tparam['titre']);
		$dossier = $this->Dossier().'images/';
		$this->courbe = new Image($Tparam['courbe'], $dossier);
		$this->alt_courbe = $Tparam['alt_courbe'];
		$this->hauteur = (isset($Tparam['hauteur'])) ? $Tparam['hauteur'] : 600;
		
		// variable pour le tableau
		if (isset($Tparam['tableau'])) {
			$this->tableau = new Image($Tparam['tableau'], $dossier);
			$this->alt_tableau = $Tparam['alt_tableau'];
		} else $this->tableau = null;
	}
	public function Afficher() {
		parent::Afficher();
		echo $this->courbe->Balise($this->alt_courbe, 'class="association" style="height:'.$this->hauteur.'px"'),"\n";
		if (isset($this->tableau)) { // le tableau est il défini?
			echo "<p align=center><b>Tableau de valeurs</b></p>\n";
			echo $this->tableau->Balise($this->alt_tableau, 'class="association"'),"\n";
		}
	}
}
