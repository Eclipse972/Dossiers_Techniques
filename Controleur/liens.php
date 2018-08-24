<?php
$LISTE = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // 62 possibilités
/*
 A propos des 3 paramètres. Ce sont des entiers
 * support: identifiant du support.-1 signifie aucun support
 * item: si non nul alors identifiant du menu sinon la page a propos u support
 * sous_item: identifiant du sous item. la valeur nulle signifie aucun item sétectionné
 */

function Lien($texte, $support, $item = null, $sous_item = null) { // l'existence de la page correpondante doit être vérifiée en amont
	return '<a href="index.php'.Creer_parametre($support, $item, $sous_item).'">'.$texte.'</a>';
}

function Lien_item_selectionne($texte, $support, $item) { return '<a id="item_selectionne" '.substr(Lien($texte, $support, $item), 3); }

function Extraire_parametre(&$id, &$item, &$sous_item) { // passage d'argumentS par référence
	global $LISTE;
	$param = substr((string) $_GET["p"],0,3);	// le paramètre est converti en nombre chaîne de 3 caractères maxi
	$id			= (isset($param[0])) ? strpos($LISTE, $param[0]) : -1; //  aucun support a comme identifiant -1 => liste des supports
	$item		= (isset($param[1])) ? strpos($LISTE, $param[1]) : 1;
	$sous_item	= (isset($param[2])) ? strpos($LISTE, $param[2]) : 0;
}

function Creer_parametre($support, $item, $sous_item) {
	global $LISTE;
	$parametre = '?p='.$LISTE[(int)$support];
	if (isset($item)) {
		$parametre .= $LISTE[(int)$item];
		if (isset($sous_item))	$parametre .= $LISTE[(int)$sous_item];
	}
	return $parametre;
}
