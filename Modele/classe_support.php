<?php
class Support {
var $id;
var $nom;		// nom complet
var $pti_nom;	// nom raccourci utilisable comme nom de fichier (pas de caractère accentué, ni d'espace, ...)
var $dossier;
var $du;
var $le;
var $menu;
var $No_page;	// numéro de la page actuelle

function Support($id, $nom, $pti_nom, $dossier, $du, $le) {	// constructeur
	$this->id		= $id;
	$this->nom		= $nom;
	$this->pti_nom	= $pti_nom; // utilisé pour l'icone du support
	$this->dossier	= 'Supports/'.$dossier.'/';
	$this->du		= $du;
	$this->le		= $le;
	$this->item		= 1; // N° item actuel
	$this->sous_item= 0; // N° sous-item actuel
}
// Associations image-fichier -----------------------------------------------------------------------------
function Afficher_association($image, $fichier, $extension, $titre) {
	$page = new Association_image_fichier($this->dossier, $image, $fichier, $extension, $titre);
	$page->Afficher();
}

function Afficher_dessin_densemble() {
	$page = new Dessin_densemble($this->dossier, $this->pti_nom,$this->pti_nom);
	$page->Afficher();
}

function Afficher_eclate() {
	$page = new Eclate($this->dossier, $this->pti_nom, $this->pti_nom);
	$page->Afficher();
}
// -------------------------------------------------------------------------------------------------------
function Afficher_menu() { //$this->menu->Afficher_menu($_SESSION[SUPPORT]->No_page);
	$connexionBD	= new base2donnees;
	$T_items		= $connexionBD->Liste_item($this->id);
	$T_sous_items 	= $connexionBD->Liste_sous_item($this->id,$this->item);
	$connexionBD->Fermer();
	echo '<ul>',"\n";
	$i=1;
	while (isset($T_items[$i])) {	// affichage du menu
		echo ($i==$this->item) ? '<li id="item_selectionne">' : '<li>';	
		echo $T_items[$i]; // lien
		if (($i==$this->item) && isset($T_sous_items)) { // si item courant = item sélectionné et sous-menu existe alors affichage du sous-menu
			echo "\n\t",'<ul>',"\n";
			$j=1;
			while (isset($T_sous_items[$j])) {
				echo "\t";
				echo ($j==$this->sous_item) ? '<li id="sous_item_selectionne">' : '<li>';
				echo $T_sous_items[$j]; // lien
				echo '</li>',"\n";
				$j++;
			}
			echo "\t",'</ul>',"\n";
		}
		$i++;
		echo '</li>',"\n";
	}
	echo '</ul>',"\n";
	echo '<a href="index.php">SOMMAIRE</a>',"\n";
}

function Image() { echo '<img src="',$this->dossier,'images/',$this->pti_nom.'.png" alt="',$this->le,$this->nom,'">'; }

function Titre() { echo '<p>Dossier technique ', $this->du, $this->nom, '</p>'; } 

function Execute($script) {
	if (file_exists($this->dossier.$script.'.php'))
		include $this->dossier.$script.'.php';
	else include 'Vue/en_construction.php';
}

function Afficher_nomenclature() {
	$connexionBD = new base2donnees;	
	$nomenclature = $connexionBD->Nomenclature($_SESSION[SUPPORT]->id);
	$connexionBD->Fermer();
	if (isset($nomenclature)) {
		foreach ($nomenclature as $piece) $piece->Afficher();
	} else echo '<h1>Erreur Nomenclature</h1>';
}

function Page_existe($item,$sous_item) {
	$connexionBD = new base2donnees;
	$test = $connexionBD->Page_existe($this->id,$item,$sous_item);
	$connexionBD->Fermer();
	return $test;
}
function Script() { // exécute le script de la page actuelle
	$connexionBD = new base2donnees;
	$script = $connexionBD->Script($this->id,$this->item,$this->sous_item);
	$connexionBD->Fermer();
	return $script;
}
}
