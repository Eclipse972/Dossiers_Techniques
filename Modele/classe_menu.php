<?php
function Meme_lignee($parent, $descendant) {
	while ($parent < $descendant)
		$parent = $parent * 2; // doubler l'identifiant du parent donne celui de l'enfant
	return ($parent == $descendant);
}

class Menu {	// menu sur deux niveaux
var $dossier;	// dossier du support
var $T_item;	// tableau associatif de la forme identifiant => texte pour les items des deux niveaux
var $T_page;	// tableau associatif de la forme identifiant => page pour la page associée à chaque identifiant
var $id_item_courant;		// utilisé lors de la construction de l'arborecsence
var $id_sous_item_courant;	// idem

function Menu($dossier) { // constructeur
	$this->T_item = array();	// tableau vide
	$this->T_page = array();	// tableau vide
	// premier item par défaut. Il est inutile de le mettre dans le script creation_menu
	$this->T_item[1] = 'Mise en situation';
	$this->T_page[1] = 'MES';
	$this->id_item_courant = 1;
	$this->dossier = $dossier;
	require $dossier.'creation_menu.php'; // charge les instructions pour créer le menu
}
// fonctions utilisées dans le fichier de configuration. la syntaxe doit être compréhensible pour un non programmeur
function Ajoute_item($page, $texte) {
	$this->id_item_courant = 2*$this->id_item_courant+1;
	$this->id_sous_item_courant = $this->id_item_courant;
	$this->T_item[$this->id_item_courant] = $texte;
	$this->T_page[$this->id_item_courant] = $page;
}
function Ajoute_sous_item($page, $texte) {
	$this->id_sous_item_courant = 2*$this->id_sous_item_courant;
	$this->T_item[$this->id_sous_item_courant] = $texte;
	$this->T_page[$this->id_sous_item_courant] = $page;
}
// mots réservés pour la création d'item
function Ajoute_dessin_densemble()	{ $this->Ajoute_item('dessin_densemble', 'Dessin d&apos;ensemble'); }
function Ajoute_eclate()			{ $this->Ajoute_item('eclate', '&Eacute;clat&eacute;'); }
function Ajoute_nomenclature()		{ $this->Ajoute_item('nomenclature', 'Nomenclature'); }

// futurs items
function Ajoute_CE($eclate_CE, $T_nom_CE, $T_CE) {
	// $eclate_CE: image montrant éclaté en CE
	// $T_nom_CE: tableau contenant les nom des CE. 
	// $T_CE: tableau contant le nom des association image fichier
	Ajoute_item('eclate_CE', 'Classes d&apos;&eacute;quivalence');
	foreach($T_nom as $i => $nom){
		Ajoute_sous_item('CE'.$i, $nom);
	}
}
function Ajoute_diagrammeA0($action, $MOE, $MOS, $energie, $configurtion, $reglage, $exploitation, $VA, $disposotif, $autres_sorties) {}
// fin des items réservés,

function Afficher_menu($id_item_selectionne) {
	echo '<ul>',"\n";
	$id = 1;
	while(isset($this->T_item[$id])) {
		// un menu est sélectionné si lui ùême ou un de ces descendants est sélectionné
		echo (Meme_lignee($id, $id_item_selectionne)) ? '<li id="menu_selectionne">' : '<li>';					// balise li
		echo '<a href="index.php?support=',$_SESSION[SUPPORT]->id,'&page=',$id,'">',$this->T_item[$id],'</a>';	// le lien
		if(Meme_lignee($id, $id_item_selectionne)) $this->afficher_sous_menu($id, $id_item_selectionne);		// affichage du sous menu si besoin
		echo '</li>',"\n";
		$id = 2*$id+1;
	}
	echo '</ul>',"\n";
	echo '<a href="index.php">SOMMAIRE</a>',"\n";
}

function Afficher_sous_menu($id_racine,$id_item_selectionne) {
	if(!isset($this->T_item[2*$id_racine]))	// s'il n'y a pas de sous menu a partir de la racine sélectionée
		return;								// alors on sort de la fonction sans rien faire
		
	echo "\n\t",'<ul>',"\n";
	$id = 2*$id_racine;
	while(isset($this->T_item[$id])) {
		echo "\t",'<li>';
		if($id == $id_item_selectionne)
			 echo $this->T_item[$id];
		else echo '<a href="index.php?support=',$_SESSION[SUPPORT]->id,'&page=',$id,'">',$this->T_item[$id],'</a>';
		echo '</li>',"\n";
		$id = 2*$id;
	}
	echo "\t",'</ul>',"\n";
}
}
