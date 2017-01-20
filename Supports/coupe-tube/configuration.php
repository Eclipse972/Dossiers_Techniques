<?php // fichier de configuration du mini coupe-tube
$this->Créer_dessin_densemble();

$this->Créer_éclaté();

//création du menu
$this->Ajouter_item_menu('A-0',					'Diagramme A-0');
$this->Ajouter_item_menu('dessin_densemble',	'Dessin d&#145;ensemble');
$this->Ajouter_item_menu('eclate',				'&Eacute;clat&eacute;');
$this->Ajouter_item_menu('nomenclature',		'Nomenclature');

// création de la nomenclature
$this->Ajouter_pièce(1,'Corps','corps');
$this->Ajouter_pièce(2,'Coulisseau','coulisseau');
$this->Ajouter_pièce(3,'Rouleau','rouleau',2);
$this->Ajouter_pièce(4,'Axe de rouleau','axe2rouleau',2);
$this->Ajouter_pièce(5,'Molette','molette');
$this->Ajouter_pièce(6,'Axe de molette','axe2molette');
$this->Ajouter_pièce(7,'Axe de manoeuvre','axe2manoeuvre');
$this->Ajouter_pièce(8,'Anneau &eacute;lastique d&#145;arbre', 'anneau_elastique');
$this->Ajouter_pièce(9,'Bouton de manoeuvre','bouton2manoeuvre');
