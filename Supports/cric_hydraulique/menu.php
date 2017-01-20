<?php // création du menu pour le cric 2 tonnes
function Créer_arborescence() {
	return array( // item => Objet
		'MES'					=> array (ITEM	=> 'Mise en situation',		FILS	=> null),
		'fonctionnement'	=> array (ITEM	=> 'Fonctionnement',			FILS	=> array('monte'			=> 'mont&eacute;e',
																											'descend'		=> 'descente',
																											'precautions'	=> 'pr&eacute;cautions d&#145;utilisation')
										),
		'mvt'					=> array (ITEM	=> 'Mouvements du cric',	FILS	=> array('mvt-face'	=> 'de face',
																											'mvt-3d'		=> 'en perspective')
										),
		'AF'					=> array (ITEM	=> 'Analyse fonctionnelle',FILS	=> array('pieuvre'		=> 'diagramme des int&eacute;racteurs',
																											'fast_levage'	=> 'FAST "Levage du v&eacute;hicule"',
																											'fast_depose'	=> 'FAST "D&eacute;pose du v&eacute;hicule"')
										),
		'eclate'				=> array (ITEM	=> '&Eacute;clat&eacute;',	FILS	=> null),						
		'nomenclature'		=> array (ITEM	=> 'Nomenclature',			FILS	=> null),
		'entretien'			=> array (ITEM	=> 'Entretien du cric',		FILS	=> array('pb_levage'		=> 'Probl&egrave;me au levage',
																											'pb_descente'	=> 'Probl&egrave;me à la descente')
										),
		'remerciements'	=> array (ITEM	=> 'Remerciements',	FILS	=> null)
	);
}