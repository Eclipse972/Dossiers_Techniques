<?php // configuration de la butée 5 axes
$this->Créer_articles('de la ', 'La ');

$this->Créer_dessin_densemble();

$this->Créer_éclaté();

// création du menu
$this->Ajouter_item_menu('fonctionnement',	'Fonctionnement');
$this->Ajouter_item_menu('dessin_densemble',	'Dessin d&#145;ensemble');
$this->Ajouter_item_menu('nomenclature',	'Nomenclature');
$this->Ajouter_item_menu('eclate',			'&Eacute;clat&eacute;');

// les pièces		
$this->Ajouter_pièce( 1, 'socle',			'socle',			1, 'EN AW - 2017');
$this->Ajouter_pièce( 2, 'contre embase',	'contreembase',	1, 'EN AW - 2017');
$this->Ajouter_pièce( 3, 'module bis',		'module',			1, 'EN AW - 2017');
$this->Ajouter_pièce( 4, 'axe',			'axe4',			1, 'EN AW - 2017');
$this->Ajouter_pièce( 5, 'vis CHc M4 - 55',	'vis4x55',		1, '',			'commerce');
$this->Ajouter_pièce( 6, 'embase',			'embase',			1, 'EN AW - 2017');
$this->Ajouter_pièce( 7, 'intermédiaire',	'intermediaire',	1, 'EN AW - 2017');
$this->Ajouter_pièce( 8, 'bouton',			'bouton',			1, 'EN AW - 2017');
$this->Ajouter_pièce( 9, 'tige filetée',	'tige_filetee',	1, '',			'commerce');
$this->Ajouter_pièce(10, 'axe',			'axe10',			1, 'EN AW - 2017');
$this->Ajouter_pièce(11, 'embout',			'embout',			1, 'EN AW - 2017');
$this->Ajouter_pièce(12, 'tige',			'tige',			1, 'EN AW - 2017');

