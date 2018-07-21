<?php
class Menu {
private $ID_support;
private $item;
private $sous_item;

public function __construct($support, $item, $sous_item) {	// constructeur
	$this->ID_support	= $support;	// le support doit être validé en amont
	$this->item			= $item;
	$this->sous_item	= $sous_item;
}
public function Afficher_menu() {
	$BD	= new base2donnees; // cette BD est locale
	$T_items = $BD->Liste_item($this->ID_support,$this->item); // tableau contenant les items
	if(!isset($T_items)) { // test de l'existence des items à faire
		echo 'MENU INEXISTANT';
		return;		// on sort de la fonction
	}
	$T_sous_items 	= $BD->Liste_sous_item($this->ID_support,$this->item,$this->sous_item);
	echo '<ul>',"\n";
	foreach($T_items as $i => $item) {	// affichage du menu
		echo '<li>',$item,'</li>',"\n";	// lien
		if (($i==$this->item) && isset($T_sous_items)) { // si item courant = item sélectionné et sous-menu existe alors affichage du sous-menu
			echo "\n\t",'<ul>',"\n";
			foreach($T_sous_items as $sous_item)	echo "\t",'<li>',$sous_item,'</li>',"\n";
			echo "\t",'</ul>',"\n";
		}
	}
	echo '</ul>',"\n";
	echo '<a href="index.php">SOMMAIRE</a>',"\n";
}
}
