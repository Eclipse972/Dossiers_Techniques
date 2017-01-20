<?php // fichier de configuration de la pompe à palettes
$this->Créer_articles('de la ', 'La ');

$this->Créer_dessin_densemble();
$this->Créer_éclaté();

// menu
$this->Ajouter_item_menu('dessin_densemble', 'Dessin d&#145;ensemble');
$this->Ajouter_item_menu('nomenclature', 'Nomenclature');
$this->Ajouter_item_menu('eclate', '&Eacute;clat&eacute;');

// pièces
$this->Ajouter_pièce( 1, 'Corps',												'corps');
$this->Ajouter_pièce( 2, 'Coussinet &agrave; collerette',				'Coussinet');
$this->Ajouter_pièce( 3, 'Arbre',												'arbre');
$this->Ajouter_pièce( 4, 'Anneau &eacute;lastique pour arbre 16x1',	'Anneau_elastique');
$this->Ajouter_pièce( 5, 'Embout de tube 3/8e',								'Embout_tube', 2);
$this->Ajouter_pièce( 6, 'Palette',												'Palette',2);
$this->Ajouter_pièce( 7, 'Joint torique 50.40x3.53',						'joint_torique');
$this->Ajouter_pièce( 8, 'Plaque',												'plaque');
$this->Ajouter_pièce( 9, 'Vis ISO 10642-m3X12-8.8',						'Vis',8);