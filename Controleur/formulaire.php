<?php // controleur du formulaire
function Configurer($bd) { // renvoie l'objet du message du formulaire
Lire_parametre("f", $id, $item, $sous_item, 0, 1);
if ($id == 0) 
	$objet = '&agrave; propos de la liste de supports';
else {
	$id--; // 0 signifie pas de support mais id dans la table support commence à 0
	$support = ($bd->Support_existe($id)) ? new Support($id, $bd) : null; // création du support s'il existe
	if (!isset($support)) // pas de support?
		$objet = ''; // pas d'objet 
	else
		$objet = 'Ex: &agrave; propos '.$support->Du_support();
}
if ($objet != '') $objet ='placeholder="'.$objet.'"';
return ['css'	=> 'style_page',
		'logo'	=> '<img src="Vue/images/logo.png" alt="logo">',
		'titre'	=> 'Formulaire de contact',
		'page'	=> 'formulaire',
		'support' => $support,
		'objet' => $objet,
		'code'	=> $code];
}
