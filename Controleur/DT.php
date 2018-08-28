<?php // Controleur dossier technique
function Configurer($bd) {
list($id, $item, $sous_item) = Lire_parametre("p", -1, 1);
$support = ($bd->Support_existe($id)) ? new Support($id, $bd) : null; // création du support s'il existe
// les scénari possibles
if (!isset($support)) { // page d'index
	$css = 'style_page';
	$logo = '<img src="Vue/images/logo.png" alt="logo">';	// mon logo
	$titre = 'Liste des dossiers techniques';
	$page = 'listeDsupports';
	$cache = 'index';
}
elseif ($item > 0) { // page du dossier technique
	$css = 'styleDT';
	$logo =  Lien($support->Image(),$support->ID(),0); // le logo est un lien la page à propos (ITEM=0)
	$titre = 'Dossier technique '.$support->Du_support();
	$page = 'pageHTML';
	$support->setPosition($item, $sous_item);
	$cache = $support->Pti_nom().' '.$support->ID().'-'.$support->Item().'-'.$support->Sous_item();
}
else { // à propos du support
	$css = 'style_page';
	$logo =  $support->Image();	// image du support
	$titre = '&Agrave; propos '.$support->Du_support();
	$page = 'a_propos';
	$support->setPosition(0, 0);
	$cache = 'a propos '.$support->Pti_nom().' '.$support->ID(); // deux support peuvent avoir le même pti nom
}
return ['css'	=> $css,
		'logo'	=> $logo,
		'titre'	=> $titre,
		'page'	=> $page,
		'cache'	=> $cache,
		'support' => $support];
}
