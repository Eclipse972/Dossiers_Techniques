<?php
$LISTE = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // 62 possibilités

function Lien($texte, $support, $item = null, $sous_item = null) { // l'existence de la page correpondante doit être vérifiée en amont
	global $LISTE;
	$lien = '<a href="index.php?p='.$LISTE[$support];
	if (isset($item)) {
		$lien .= $LISTE[$item];
		if (isset($sous_item))	$lien .= $LISTE[$sous_item];
	}
	$lien .= '">'.$texte.'</a>';
	return $lien;
}
function Extraire_parametre(&$id, &$item, &$sous_item) { // passage d'argumentS par référence
	global $LISTE;
	$param = substr((string) $_GET["p"],0,3);	// le paramètre est converti en nombre chaîne de 3 caractères maxi
	$id			= (isset($param[0])) ? strpos($LISTE, $param[0]) : -1; //  aucun support a comme identifiant -1 => liste des supports
	$item		= (isset($param[1])) ? strpos($LISTE, $param[1]) : 1;
	$sous_item	= (isset($param[2])) ? strpos($LISTE, $param[2]) : 0;
}

function Lien_item_selectionne($texte, $support, $item) { return '<a id="item_selectionne" '.substr(Lien($texte, $support, $item), 3); }
