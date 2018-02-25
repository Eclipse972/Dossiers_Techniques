<?php
class Menu {
var $ID_support;
var $item;
var $sous_item;

function Menu($support, $item, $sous_item) {	// constructeur
	$this->ID_support	= $support;	// le support doit être validé en amont
	$this->item			= $item;
	$this->sous_item	= $sous_item;
}
function Afficher_menu() {
	
}
}
