<?php // fichier de configuration du cric bouteille
$this->Créer_dessin_densemble();
$this->Créer_éclaté();

// création du menu
$this->Ajouter_item_menu('fonctionnement',	'Fonctionnement');
$this->Ajouter_item_sous_menu('montee',		'Mont&eacute;e');
$this->Ajouter_item_sous_menu('descente',		'Descente');
$this->Ajouter_item_menu('dessin_densemble',	'Dessin d&#145;ensemble');
$this->Ajouter_item_menu('nomenclature',		'Nomenclature');
$this->Ajouter_item_menu('eclate',				'&Eacute;clat&eacute;');

// création de la nomenclature
$this->Ajouter_pièce( 1,'Embase de cric',								'Embase');
$this->Ajouter_pièce( 2,'Corps de pompe',								'Corps2pompe');
$this->Ajouter_pièce( 3,'Piston de pompe',							'piston_pompe');
$this->Ajouter_pièce( 4,'Axe d&#165;articulation',					'axe_articulation', 2);
$this->Ajouter_pièce( 5,'Segment d&#145;arrêt radial 6 x 0,7',	'segment_arret', 4);
$this->Ajouter_pièce( 6,'Articulation',								'articulation');
$this->Ajouter_pièce( 7,'Piston r&eacute;cepteur',					'piston_recepteur');
$this->Ajouter_pièce( 8,'Couvercle',									'Couvercle');
$this->Ajouter_pièce( 9,'Cylindre principal',						'cylindre_principal');
$this->Ajouter_pièce(10,'R&eacute;servoir',							'reservoir');
$this->Ajouter_pièce(11,'&Eacute;crou M4',							'ecrouM4', 4);
$this->Ajouter_pièce(12,'Rondelle M4',									'rondelleM4', 4);
$this->Ajouter_pièce(13,'Tirant',										'tirant', 4);
$this->Ajouter_pièce(14,'Biellette',									'biellette');
$this->Ajouter_pièce(15,'Axe d&#165;articulation de chape',		'axe_chape');
$this->Ajouter_pièce(16,'Pointeau',										'pointeau');
$this->Ajouter_pièce(17,'Joint de pointeau de retour',			'joint2pointeau');
$this->Ajouter_pièce(18,'Chandelle',									'Chandelle');
$this->Ajouter_pièce(19,'Bille de tarage',							'bille_tarage');
$this->Ajouter_pièce(20,'Poussoir de tarage',						'poussoir2tarage');
$this->Ajouter_pièce(21,'Ressort de tarage',							'ressort2tarage');
$this->Ajouter_pièce(22,'Vis de tarage',								'vis2tarage');							
$this->Ajouter_pièce(23,'Bouchon de tarage',							'bouchon_tarage');
$this->Ajouter_pièce(24,'Joint plat de bouchon de tarage',		'joint2tarage');
$this->Ajouter_pièce(25,'Bouchon de remplissage',					'bouchon2remplissage');
$this->Ajouter_pièce(26,'Bille d&#165;admission',					'bille_admission');
$this->Ajouter_pièce(27,'Joint de pompe',								'joint2pompe');
$this->Ajouter_pièce(28,'Joint torique de piston',					'joint2piston');
$this->Ajouter_pièce(29,'Vis de fixation du corps de pompe',	'vis2fixation_du_corps2pompe');
$this->Ajouter_pièce(30,'Levier',										'levier');
$this->Ajouter_pièce(31,'Joint torique de réservoir',				'joint2reservoir');
$this->Ajouter_pièce(32,'Joint torique de corps de pompe',		'joint_torique2corps2pompe');
