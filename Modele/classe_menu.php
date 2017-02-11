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
	$this->id_item_courant = 0;
	$this->dossier = $dossier;
}
function Ajoute_item($page, $texte) {	// le code équivalent est à retirer de la classe support
	$this->id_item_courant = 2*$this->id_item_courant+1;
	$this->id_sous_item_courant = $this->id_item_courant;
	$this->T_item[$this->id_item_courant] = $texte;
	$this->T_page[$this->id_item_courant] = $page;
}
function Ajoute_sous_item($texte, $page) {
	$this->id_sous_item_courant = 2*$this->id_sous_item_courant;
	$this->T_item[$this->id_sous_item_courant] = $texte;
	$this->T_page[$this->id_sous_item_courant] = $page;
}

function Configurer_menu(){ // charge les instructions pour créer le menu seul. /!\ le cric hydraulique est utilisé comme exemple 
	require $this->dossier.'creation_menu.php';
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
function Afficher_page($id) {	// donne le nom de la page à télécharger associée à l'id sélectionné dans le menu
	$script = (isset($_SESSION[MENU]->T_page[$id])) ? $_SESSION[MENU]->T_page[$id] : 'erreur 404';
	$dossier = $_SESSION[SUPPORT]->dossier;
	
	switch($script) {	// on  regarde si script est un mot réservé
		case 'erreur 404' :
			echo '<h1>Page introuvable</h1>';
			break;
		case 'eclate':
			Afficher_eclate();
			break;
		case 'dessin_densemble':
			Afficher_dessin_densemble();
			break;
		case 'nomenclature': 
			include 'Vue/nomenclature.php';
			break;
		default:	// ce n'est pas un mot réservé
			include $dossier.$script.'.php';
	}
}
}
