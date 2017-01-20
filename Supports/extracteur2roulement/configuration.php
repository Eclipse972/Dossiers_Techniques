<?php // configuration de l'extracteur
$this->Créer_articles('de l&#145;', 'L&#145;');

$this->Créer_dessin_densemble();
$this->Créer_éclaté();
// menu
$this->Ajouter_item_menu('fonctionnement',	'Fonctionnement');
$this->Ajouter_item_menu('dessin_densemble',	'Dessin d&#145;ensemble');
$this->Ajouter_item_menu('nomenclature',		'Nomenclature');
$this->Ajouter_item_menu('eclate',				'&Eacute;clat&eacute;');
// pièces
$this->Ajouter_pièce(1, 'Corps',				'corps');
$this->Ajouter_pièce(2, 'Vis',				'vis');
$this->Ajouter_pièce(3, '&Eacute;crou',	'ecrou');
$this->Ajouter_pièce(4, 'Axe',				'axe',2);
$this->Ajouter_pièce(5, 'Doigt',				'doigt',2);