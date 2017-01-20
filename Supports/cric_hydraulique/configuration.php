<?php // fichier de configuration du cric hydraulique
// création de l'arborescence de menu
$this->Ajouter_item_menu('fonctionnement',	'Fonctionnement');
$this->Ajouter_item_sous_menu('monte',  		'mont&eacute;e');
$this->Ajouter_item_sous_menu('descend',  	'descente');
$this->Ajouter_item_sous_menu('precautions', 'pr&eacute;cautions d&#145;utilisation');
$this->Ajouter_item_menu('mvt',					'Mouvements du cric');
$this->Ajouter_item_sous_menu('mvt-face',		'de face');
$this->Ajouter_item_sous_menu('mvt-3d',		'en perspective');
$this->Ajouter_item_menu('AF',					'Analyse fonctionnelle');
$this->Ajouter_item_sous_menu('pieuvre',		'diagramme des int&eacute;racteurs');
$this->Ajouter_item_sous_menu('fast_levage',	'FAST "Levage du v&eacute;hicule"');
$this->Ajouter_item_sous_menu('fast_depose',	'FAST "D&eacute;pose du v&eacute;hicule"');
$this->Ajouter_item_menu('eclate_cric',		'&Eacute;clat&eacute;');
$this->Ajouter_item_menu('nomenclature',		'Nomenclature');
$this->Ajouter_item_menu('entretien',			'Entretien du cric');
$this->Ajouter_item_sous_menu('pb_levage',	'Probl&egrave;me au levage');
$this->Ajouter_item_sous_menu('pb_descente',	'Probl&egrave;me à la descente');
$this->Ajouter_item_menu('remerciements',		'Remerciements');

// création de la nomenclature
$this->Ajouter_pièce( 1, 'Flasque gauche',							'flasque_gauche',1,'png','EASM');
$this->Ajouter_pièce( 2, 'Flasque droit',								'flasque_droit','png','EASM');
$this->Ajouter_pièce( 3, 'Roulette directrice assemblée',		'roulette_directrice',2,'png','EASM');
$this->Ajouter_pièce( 4, 'Roue avant',									'roue_avant',2);
$this->Ajouter_pièce( 5, 'Axe roues avant',							'axe_roues_avant',2);
$this->Ajouter_pièce( 6, 'Axe pivot v&eacute;rin',					'axe_pivot_verin',2);
$this->Ajouter_pièce( 7, 'Axe pivot bras de levage',				'axe_pivot_bras_levage');
$this->Ajouter_pièce( 8, 'Rondelle M12',								'rondelleM12',6);
$this->Ajouter_pièce( 9, '&Eacute;crou hexagonal ISO 4032-M12','ecrouM12',6);
$this->Ajouter_pièce(10, 'Tourillon',									'',2);
$this->Ajouter_pièce(11, 'Anneau élastique pour arbre 10x1',	'', 2);
$this->Ajouter_pièce(12, 'Unité hydraulique',						'');
