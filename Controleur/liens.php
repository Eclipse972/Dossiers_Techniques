<?php
$LISTE = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // 62 possibilités
/*
 A propos des 3 paramètres. Ce sont des entiers
 * support: identifiant du support.-1 signifie aucun support
 * item: si non nul alors identifiant du menu sinon la page a propos du support
 * sous_item: identifiant du sous item. la valeur nulle signifie aucun sous-item sétectionné
 */

function Lien($texte, $support, $item = null, $sous_item = null) { // l'existence de la page correpondante doit être vérifiée en amont
	return '<a href="pageDT.php?p='.Creer_parametre($support, $item, $sous_item).'">'.$texte.'</a>';
}

// Lecture des paramètres
function Lire_parametre($nom, $defaut_id = 0, $defaut_item = 0, $defaut_sous_item = 0) {
	global $LISTE;
	$param = substr((string) $_GET[$nom],0,3);	// le paramètre est converti en nombre chaîne de 3 caractères maxi
	$id			= (isset($param[0])) ? strpos($LISTE, $param[0]) : $defaut_id; //  aucun support a comme identifiant -1 => liste des supports
	$item		= (isset($param[1])) ? strpos($LISTE, $param[1]) : $defaut_item;
	$sous_item	= (isset($param[2])) ? strpos($LISTE, $param[2]) : $defaut_sous_item;
	return [$id, $item, $sous_item];
}

// Ecriture des paramètres
function Creer_parametre($param1, $param2, $param3) {
	// ne peut pas être exporté vers la classe support car car cette fonction crée les menus
	global $LISTE;
	$parametre = $LISTE[(int)$param1];
	if (isset($param2)) {
		$parametre .= $LISTE[(int)$param2];
		if (isset($param3))	$parametre .= $LISTE[(int)$param3];
	}
	return $parametre;
}
