<?php
define("origine",	64); // code ascii de @ 
// ATTENTION: les fonction lien et Extraire_parametres utilisent cette constantE

function Lien($texte, $support, $item = null, $sous_item = null) { // l'existence de la page correpondante doit être vérifiée en amont
	$lien = '<a href="index.php?p=';
	$lien .= chr(origine+$support);
	if (isset($item)) {
		$lien .= chr(origine+$item);
		if (isset($sous_item)) $lien .=chr(origine+$sous_item);
	} // Si l'item n'existe pas il n'y a pas de sous-item
	$lien .= '">'.$texte.'</a>';
	return $lien;
}
function Extraire_parametre(&$id, &$item, &$sous_item) { // passage d'argumentS par référence
	$param = substr((string) $_GET["p"],0,3);	// le paramètre est converti en nombre chaîne de 3 caractères maxi
	$id			= (isset($param[0])) ? ord($param[0])-origine : -1; //  aucun support a comme identifiant -1 => liste des supports
	$item		= (isset($param[1])) ? ord($param[1])-origine : 1;	// 
	$sous_item	= (isset($param[2])) ? ord($param[2])-origine : 0;
}

function Lien_item_selectionne($texte, $support, $item) { return '<a id="item_selectionne" '.substr(Lien($texte, $support, $item), 3); }
