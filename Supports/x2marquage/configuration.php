<?php // fichier de configuration de la pince de marquage
$this->Créer_articles('de la ', 'La ');

$this->Créer_dessin_densemble();
$this->Créer_éclaté();

// menu
$this->Ajouter_item_menu('fonctionnement', 'Fonctionnement');
$this->Ajouter_item_menu('dessin_densemble', 'Dessin d&#145;ensemble');
$this->Ajouter_item_menu('nomenclature', 'Nomenclature');
$this->Ajouter_item_menu('eclate', '&Eacute;clat&eacute;');

// pièces
$this->Ajouter_pièce( 1, 'Support de v&eacute;rin',							'this2verin');
$this->Ajouter_pièce( 2, 'Fond',														'fond');
$this->Ajouter_pièce( 3, 'Plaque avant',											'plaque_avant');
$this->Ajouter_pièce( 4, 'Goupile ISO 87-34-5x16-A',							'goupille',4);
$this->Ajouter_pièce( 5, 'T&ocirc;le de protection',							'tole2protection');
$this->Ajouter_pièce( 6, 'Vis &eacute;paul&eacute;e M5x40 NF E 27-191',	'vis_epauleeM5x40',2);
$this->Ajouter_pièce( 7, 'Entretoise',												'entretoise',4);
$this->Ajouter_pièce( 8, 'Bras sup&eacute;rieur',								'bras_superieur');
$this->Ajouter_pièce( 9, 'Bras inf&eacute;rieur',								'bras_inferieur');
$this->Ajouter_pièce(10, 'Carter sup&eacute;rieur',							'carter_superieur');
$this->Ajouter_pièce(11, 'Carter inf&eacute;rieur',							'carter_inferieur');
$this->Ajouter_pièce(12, 'Corps v&eacute;rin PES 32 P NA 254',				'corps_verin');
$this->Ajouter_pièce(13, 'Piston PES 32 NA 25 DM4',							'piston',1,'EASM');
$this->Ajouter_pièce(14, 'Came',														'came');
$this->Ajouter_pièce(15, 'Axe',														'axe');
$this->Ajouter_pièce(16, 'Entretoise ep. 1.8',									'entretoise_ep1.8');
$this->Ajouter_pièce(17, 'Enclume',													'enclume');
$this->Ajouter_pièce(18, 'Plaque d&#145;appui',									'plaque_dappui');
$this->Ajouter_pièce(19, 'Poinçon',													'poincon');
$this->Ajouter_pièce(20, 'Roulement SNR 624EE',									'roulement',2,'EASM');
$this->Ajouter_pièce(21, 'Vis FHC NF E 27-160M3X0,5-8-8.8',					'visFHC',13);
$this->Ajouter_pièce(22, 'Vis CZX NF E25-11 M3-0,5-10-4,8-1',				'visCZX',8);
$this->Ajouter_pièce(23, 'Vis sans t&ecirc;te &agrave; bout plat NF E-27-180 M3x0,5-8-3,3h',	'vis_sans_tete',6);
$this->Ajouter_pièce(24, 'Vis ISO 4762-M5x16-8.8',								'visISO',8);
$this->Ajouter_pièce(25, 'Ressort de rappel',									'ressort');
