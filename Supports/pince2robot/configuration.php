<?php // configuration de la pince de robot
$this->Créer_articles('de la ', 'La ');

$this->Créer_éclaté();

// menu
$this->Ajouter_item_menu('fonctionnement',	'Fonctionnement');
$this->Ajouter_item_menu('nomenclature',		'Nomenclature');
$this->Ajouter_item_menu('eclate',			'&Eacute;clat&eacute;');

// pièces
$this->Ajouter_pièce(1, 'Corps',																'corps',1, 'png', 'EASM');
$this->Ajouter_pièce(2, 'Vis',																'vis');
$this->Ajouter_pièce(3, '&Eacute;crou',													'ecrou');
$this->Ajouter_pièce(4, 'roulement &agrave; double rang&eacute;e de billes',	'roulement',1, 'png', 'EASM');
$this->Ajouter_pièce(5, 'Levier',															'levier',2);
$this->Ajouter_pièce(6, 'Doigt',																'doigt',2);
$this->Ajouter_pièce(7, 'Grande biellette',												'grande_biellette',4);
$this->Ajouter_pièce(8, 'Petite biellette',												'petite_biellette',2);
