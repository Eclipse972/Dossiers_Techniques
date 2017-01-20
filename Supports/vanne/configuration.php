<?php // fichier de configuration de la vanne sphérique
$this->Créer_articles('de la ', 'La ');

$this->Créer_dessin_densemble();
$this->Créer_éclaté();

// menu
$this->Ajouter_item_menu('fonctionnement',	'Fonctionnement');
$this->Ajouter_item_menu('dessin_densemble',	'Dessin d&#145;ensemble');
$this->Ajouter_item_menu('nomenclature',		'Nomenclature');
$this->Ajouter_item_menu('eclate',			'&Eacute;clat&eacute;');

// pièces
$this->Ajouter_pièce( 1, 'Corps',						'corps');
$this->Ajouter_pièce( 2, 'Raccord',						'raccord',2);
$this->Ajouter_pièce( 3, 'Bille',						'bille');
$this->Ajouter_pièce( 4, 'Joint de si&egrave;ge',	'joint2siege', 2);
$this->Ajouter_pièce( 5, 'Axe de manoeuvre',			'axe2manoeuvre');
$this->Ajouter_pièce( 6, 'Rondelle but&eacute;e',	'rondelle_butee');
$this->Ajouter_pièce( 7, 'Rondelle L3',				'rondelle_L3');
$this->Ajouter_pièce( 8, 'Manette',						'manette');
$this->Ajouter_pièce( 9, 'Vis',							'vis');
$this->Ajouter_pièce(10, 'Joint torique',				'joint_torique');
$this->Ajouter_pièce(11, 'Joint torique',				'joint_torique2', 2);
$this->Ajouter_pièce(12, 'But&eacute;e',				'butee');
