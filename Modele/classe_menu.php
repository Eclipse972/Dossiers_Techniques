<?php
class Menu {	// menu sur deux niveaux
var $dossier;	// dossier du support
var $T_item;	// tableau associatif de la forme identifiant => texte pour les items des deux niveaux
var $T_page;	// tableau associatif de la forme identifiant => page pour la page associée à chaque identifiant
var $id_item_courant;		// utilisé lors de la construction de l'arborecsence
var $id_sous_item_courant;	// idem

function Menu($dossier) { // constructeur
	$this->T_item = array();	// tableau vide
	$this->T_page = array();	// tableau vide
	// premier item par défaut. Il est inutile de la mettre dans le script creation_menu
	$this->T_item[1] = 'Mise en situation';
	$this->T_page[1] = 'MES';
	$this->id_item_courant = 1;
	$this->dossier = $dossier;
	require $dossier.'creation_menu.php'; // charge les instructions pour créer le menu
}
function Ajoute_item($page, $texte) {
	$this->id_item_courant = 2*$this->id_item_courant+1;
	$this->id_sous_item_courant = $this->id_item_courant;
	$this->T_item[$this->id_item_courant] = $texte;
	$this->T_page[$this->id_item_courant] = $page;
}
// items  réservés
function Ajoute_dessin_densemble() {
	$this->Ajoute_item('dessin_densemble', 'Dessin d&apos;ensemble');
}
function Ajoute_eclate() {
	$this->Ajoute_item('eclate', '&Eacute;clat&eacute;');
}
function Ajoute_nomenclature() {
	$this->Ajoute_item('nomenclature', 'Nomenclature');
}
// fin des items réservés

function Ajoute_sous_item($page, $texte) {
	$this->id_sous_item_courant = 2*$this->id_sous_item_courant;
	$this->T_item[$this->id_sous_item_courant] = $texte;
	$this->T_page[$this->id_sous_item_courant] = $page;
}

function Afficher_menu($id_item_selectionne) {
	echo '<ul>',"\n";
	$id = 1;
	while(isset($this->T_item[$id])) {
		echo '<li>';
		$id_parent = $id;	// on part de l'id courant
		while($id_parent < $id_item_selectionne)
			$id_parent = 2*$id_parent;		// doubler l'identifiant d'un parent donne l'identifiant de l'enfant
			
		if($id_parent == $id_item_selectionne) {	// est ce qu'un des descendants et l'id sélectionné?
			echo $this->T_item[$id];
			$this->afficher_sous_menu($id, $id_item_selectionne);
		}
		else echo '<a href="index.php?support=',$_SESSION[ID_SUPPORT],'&page=',$id,'">',$this->T_item[$id],'</a>';
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
		else echo '<a href="index.php?support=',$_SESSION[ID_SUPPORT],'&page=',$id,'">',$this->T_item[$id],'</a>';
		echo '</li>',"\n";
		$id = 2*$id;
	}
	echo "\t",'</ul>',"\n";
}
}
