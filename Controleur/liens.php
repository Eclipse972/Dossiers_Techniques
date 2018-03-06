<?php
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
function Lien_item_selectionne($texte, $support, $item) { return '<a id="item_selectionne" '.substr(Lien($texte, $support, $item), 3); }
