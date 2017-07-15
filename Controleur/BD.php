<?php  // simulation de connexion à une base de données
define("NB_SUPPORT", 15);

function Selectionne_support($id) {
	switch($id) {
	case  0: return new Support('bouton poussoir',					'BP',				'BP');
	case  1: return new Support('but&eacute;e 5 axes',				'butee', 		'butee5axes',		'de la ','la ');
	case  2: return new Support('cambreuse',							'cambreuse',	'cambreuse',		'de la ','la ');
	case  3: return new Support('cric bouteille',					'cric',			'cric_bouteille');
	case  4: return new Support('cric hydraulique 2 tonnes',		'cric',			'cric_hydraulique');
	case  5: return new Support('&eacute;lectrovanne',				'electrovanne','electrovanne',			'de l&apos;','l&apos;');
	case  6: return new Support('&eacute;tau de mod&eacute;lisme','etau',		'etau',						'de l&apos;','l&apos;');
	case  7: return new Support('extracteur de roulement',		'extracteur',	'extracteur2roulement',	'de l&apos;','l&apos;');
	case  8: return new Support('mini coupe-tube',					'mini_coupe-tube','coupe-tube');
	case  9: return new Support('pince de marquage',				'pince',			'x2marquage',		'de la ','la ');
	case 10: return new Support('pince de robot',					'pince',			'pince2robot',		'de la ','la ');
	case 11: return new Support('pompe &agrave; palettes',		'pompe',			'pompeApalettes', 'de la ','la ');
	case 12: return new Support('pr&eacute;henseur de culasse',	'prehenseur',	'prehenseur');
	case 13: return new Support('vanne sph&eacute;rique',			'vanne',			'vanne',				'de la ','la ');
	case 14: return new Support('alternateur',						'alternateur',	'alternateur',		'de l&apos;','l&apos;');
	default: return null;	// mettre à jour la constante NB_SUPPORT pour toute modification
	}
}
