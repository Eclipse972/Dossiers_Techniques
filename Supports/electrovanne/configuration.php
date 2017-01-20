<?php // fichier de configuration de l'électrovanne
$this->Créer_articles('de l&#145;', 'L&#145;');

$this->Créer_dessin_densemble();

$this->Créer_éclaté();

// création du menu
$this->Ajouter_item_menu('MES',					'Mise en situation');
$this->Ajouter_item_menu('fonctionnement',	'Fonctionnement');
$this->Ajouter_item_menu('AF',					'Analyse fonctionnelle');
$this->Ajouter_item_menu('dessin_densemble',	'Dessin d&#145;ensemble');
$this->Ajouter_item_menu('eclate',				'&Eacute;clat&eacute;');
$this->Ajouter_item_menu('nomenclature',		'Nomenclature');

// liste des pièces
$this->Ajouter_pièce( 1, 'Corps',			'corps');
$this->Ajouter_pièce( 2, 'Membrane',		'membrane');
$this->Ajouter_pièce( 3, 'Joint torique',	'joint_torique',2);
$this->Ajouter_pièce( 4, 'Noyau',			'noyau');
$this->Ajouter_pièce( 5, 'Ressort',			'ressort');
$this->Ajouter_pièce( 6, 'Support',			'this');
$this->Ajouter_pièce( 7, 'Axe guide',		'axe_guide');
$this->Ajouter_pièce( 8, 'Bobine',			'bobine');
$this->Ajouter_pièce( 9, 'Boitier',			'boitier');
$this->Ajouter_pièce(10, 'Vis CHc M5-25',	'vis');
$this->Ajouter_pièce(11, '&Eacute;crou',	'ecrou');