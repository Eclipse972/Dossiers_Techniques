<?php // configuration de l'étau
$this->Créer_articles('de l&#145;', 'L&#145;');

$this->Créer_dessin_densemble();

$this->Créer_éclaté();

// création du menu
$this->Ajouter_item_menu('fonctionnement',	'Fonctionnement');
$this->Ajouter_item_menu('dessin_densemble',	'Dessin d&#145;ensemble');
$this->Ajouter_item_menu('nomenclature',	'Nomenclature');
$this->Ajouter_item_menu('eclate',			'&Eacute;clat&eacute;');
$this->Ajouter_item_menu('CE',				'Classes d&#145;&eacute;quivalence');
$this->Ajouter_item_menu('liaisons',		'Liaisons');

// les pièces		
$this->Ajouter_pièce( 1, 'Mors mobile',							'mors-mobile');
$this->Ajouter_pièce( 2, 'Mors fixe',								'mors-fixe');
$this->Ajouter_pièce( 3, 'Garniture de mors mobile',			'garniture-mors-mobile');
$this->Ajouter_pièce( 4, 'Vis FS M5-20 5-6',						'vis_FS_M5-20',4);
$this->Ajouter_pièce( 5, 'Garniture de mors fixe',				'garniture-mors-fixe');
$this->Ajouter_pièce( 6, 'Vis de manoeuvre',						'vis2manoeuvre');
$this->Ajouter_pièce( 7, '&Eacute;crou H M12-8',				'ecrou-H-M12');
$this->Ajouter_pièce( 8, 'Bague de renfort',						'bague2renfort');
$this->Ajouter_pièce( 9, 'Tige de poign&eacute;e',				'tige2poignee');
$this->Ajouter_pièce(10, 'Semelle',									'semelle');
$this->Ajouter_pièce(11, 'Vis CHc M5-10 - 8.8',					'vis_CHC_M5-10',2);
$this->Ajouter_pièce(12, 'Tige guide',								'tige_guide',2);
$this->Ajouter_pièce(13, 'Vis sans t&ecirc;te HC M4-6',		'vis_HC_M4-6',2);
$this->Ajouter_pièce(14, 'Goupille élastique',					'goupille_elastique_3x16');
$this->Ajouter_pièce(15, 'Embout de tige de poign&eacute;e','embout2poignee',2);

// les classes d'équivalence
$this->Ajouter_CE('CE0',	'CE_mors_fixe',			'Mors fixe');
$this->Ajouter_CE('CE1',	'CE_mors_mobile',			'Mors mobile');
$this->Ajouter_CE('CE2', 	'CE_tige_de_poignee',	'Tige de poign&eacute;e');
$this->Ajouter_CE('CE3',	'CE_vis_de_manoeuvre',	'Vis de manoeuvre');