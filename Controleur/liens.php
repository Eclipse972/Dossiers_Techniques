<?php
/*
 A propos des 3 paramètres. Ce sont des entiers
 * support: identifiant du support.-1 signifie aucun support
 * item: si non nul alors identifiant du menu sinon la page a propos du support
 * sous_item: identifiant du sous item. la valeur nulle signifie aucun sous-item sétectionné
 */

function Lien($texte, $support, $item = null, $sous_item = null) { // l'existence de la page correpondante doit être vérifiée en amont
	return '<a href="pageDT.php?'.Creer_parametre($support, $item, $sous_item).'">'.$texte.'</a>';
}

// Lecture des paramètres
function Lire_parametre($defaut_id, $defaut_item = 1, $defaut_sous_item = 0) {
	$id	= (int)$_GET["s"];
	
	$menu		= substr((string) $_GET["m"],0,2);	// le paramètre est converti en nombre chaîne de 2 caractères maxi
	$item		= (isset($menu[0])) ? ord($menu[0])-ord('a'): $defaut_item;
	$sous_item	= (isset($menu[1])) ? ord($menu[1])-ord('a'): $defaut_sous_item;
	return [$id, $item, $sous_item];
}

// Ecriture des paramètres
function Creer_parametre($param1, $param2 = null, $param3 = null) {
	// ne peut pas être exporté vers la classe support car car cette fonction crée les menus
	// elle ne peut être intégrée dans Lien car elle est utilisée seule dans pageDT pour créer les caches
	$parametre = 's='.(string)$param1;
	if (isset($param2)) {
		$parametre .= '&m='.chr($param2+ord('a'));
		if (isset($param3))	$parametre .= chr($param3+ord('a'));
	}
	return $parametre;
}
