<?php // menu du cric hydraulique
$this->Ajoute_item('MES',					'Mise en situation');
$this->Ajoute_item('fonctionnement',	'Fonctionnement');
$this->Ajoute_sous_item('monte',  		'mont&eacute;e');
$this->Ajoute_sous_item('descend',  	'descente');
$this->Ajoute_sous_item('precautions', 'pr&eacute;cautions d&#145;utilisation');
$this->Ajoute_item('mvt',					'Mouvements du cric');
$this->Ajoute_sous_item('mvt-face',		'de face');
$this->Ajoute_sous_item('mvt-3d',		'en perspective');
$this->Ajoute_item('AF',					'Analyse fonctionnelle');
$this->Ajoute_sous_item('pieuvre',		'diagramme des int&eacute;racteurs');
$this->Ajoute_sous_item('fast_levage',	'FAST "Levage du v&eacute;hicule"');
$this->Ajoute_sous_item('fast_depose',	'FAST "D&eacute;pose du v&eacute;hicule"');
$this->Ajoute_item('eclate_cric',		'&Eacute;clat&eacute;');
$this->Ajoute_item('nomenclature',		'Nomenclature');
$this->Ajoute_item('entretien',			'Entretien du cric');
$this->Ajoute_sous_item('pb_levage',	'Probl&egrave;me au levage');
$this->Ajoute_sous_item('pb_descente',	'Probl&egrave;me à la descente');
$this->Ajoute_item('remerciements',		'Remerciements');