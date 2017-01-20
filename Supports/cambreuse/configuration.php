<?php // fichier de configuration de la cambreuse
$this->Créer_dessin_densemble();
$this->Créer_éclaté();

// menu
$this->Ajouter_item_menu('fonctionnement',			'Fonctionnement');
$this->Ajouter_item_sous_menu('position1',			'&Eacute;tape 1');
$this->Ajouter_item_sous_menu('position2',			'&Eacute;tape 2');
$this->Ajouter_item_sous_menu('position3',			'&Eacute;tape 3');
$this->Ajouter_item_sous_menu('caracteristiques',	'Caract&eacute;ristiques');
$this->Ajouter_item_menu('dessin_densemble',			'Dessin d&#145;ensemble');
$this->Ajouter_item_menu('nomenclature',				'Nomenclature');
$this->Ajouter_item_menu('eclate',						'&Eacute;clat&eacute;');

// nomenclature				 rep	nom																fichier							  Nb matière			Observation	
$this->Ajouter_pièce(			1, 'Table',															'Table',								1,'',					'non représentée');
$this->Ajouter_sous_ensemble(	2, 'Corps de vérin ISO 6431 63X50', 						'corps2verin');
$this->Ajouter_sous_ensemble(	3, 'Corps de vérin ISO 6431 80X50',							'corps2verin2');
$this->Ajouter_sous_ensemble(	4, 'Tige de vérin ISO 6431 63X50',							'tige2verin');
$this->Ajouter_sous_ensemble(	5, 'Tige de vérin ISO 6431 80X50',							'tige2verin2');
$this->Ajouter_pièce(			6, 'Vis H M8x65',													'visHM8x65',						1,'',					'NF EN ISO 4017');
$this->Ajouter_pièce(			7, 'Basculeur usiné',											'basculeur',						1,'EN AW 2017');
$this->Ajouter_pièce(			8, 'Axe de bielle',												'axe2bielle',						1,'C 40');
$this->Ajouter_pièce(			9, 'Coussinet 12-18x12',										'coussinet12-18x12',				2,'CW 453K',		'ISO 2795');
$this->Ajouter_pièce(			10,'Bielle',														'bielle',							1,'E 335');
$this->Ajouter_pièce(			11,'Coussinet 12-18x16',										'coussinet12-18x16',				3,'CW 453K',		'ISO 2795');
$this->Ajouter_pièce(			12,'Coussinet 16-22x16',										'coussinet16-22x16',				1,'CW 453K',		'ISO 2795');
$this->Ajouter_pièce(			13,'Chape',															'chape',								1,'S 235');
$this->Ajouter_pièce(			14,'Axe de chape',												'Axe2chape',						1,'C 40');
$this->Ajouter_pièce(			15,'Butée',															'butee',								1,'S 235');
$this->Ajouter_pièce(			16,'Bride de blocage',											'Bride2blocage',					1,'C 40',			'Trempé');
$this->Ajouter_pièce(			17,'Bride',															'Bride',								1,'C 40');
$this->Ajouter_pièce(			18,'Flasque',														'Flasque',							2,'EN AW 2017');
$this->Ajouter_pièce(			19,'Plaque de support de vérin de cambrage',				'Plaque_cambrage',				1);
$this->Ajouter_pièce(			20,'Plaque de support de vérin de bridage',				'Plaque_bridage',					1);
$this->Ajouter_pièce(			21,'Cale',															'Cale',								1,'EN AW 2017');
$this->Ajouter_pièce(			22,'Support de fixation',										'Support2fixation',				4,'S 235');
$this->Ajouter_pièce(			23,'Bride d&#145;arbre',										'Bride_darbre',					4,'S 235');
$this->Ajouter_pièce(			24,'Tige de guidage',											'Tige2guidage',					2);
$this->Ajouter_pièce(			25,'Plaque support de posoir',								'Plaque_support2posoir',		1,'S 235');
$this->Ajouter_pièce(			26,'Support de vis d&#145;arr&ecirc;t',					'Support2vis_darret',			1,'S 235');
$this->Ajouter_pièce(			27,'Support d&#145:axe d&#145;&eacute;querre',			'Support_daxe_dequerre',		2);
$this->Ajouter_pièce(			28,'Axe d&#145;&eacute;querre',								'Axe_dequerre',					2);
$this->Ajouter_pièce(			29,'&Eacute;crou H M8',											'EcrouHM8',							1,'',					'ISO EN 4032');
$this->Ajouter_pièce(			30,'Vis CHC M6-16-14',											'CHCM6-16-14',						20);
$this->Ajouter_pièce(			31,'Vis CHC M8-16-14',											'CHCM8-16-14',						16);
$this->Ajouter_pièce(			32,'Support de but&eacute;e',									'Support2butee',					1,'C 40');
$this->Ajouter_pièce(			33,'But&eacute;e de positionnement ext&eacuterieure',	'Butte2positionnement_ext',	5,'C 40');
$this->Ajouter_pièce(			34,'Goupille 3 x 20',											'Goupille3x20',					2,'',					'ISO 8752');
$this->Ajouter_pièce(			35,'Vis t&ecirc;te frais&eacute;e M6-12',					'VisFSM6-12',						4,'',					'ISO 10642');
$this->Ajouter_pièce(			36,'Appui fil d=8 L = 150',									'Appui_fil_d8_L150');
$this->Ajouter_sous_ensemble( 37,'Branche gauche',												'branche_gauche');
$this->Ajouter_sous_ensemble( 38,'Branche droite',												'branche_droite');