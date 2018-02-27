<?php // fonction pour les liens
function Balise_a($support, $item = null, $sous_item = null) { // l'existence de la page correpondante doit être vérifiée en amont
	$lien = '<a href="index.php?support='.$support;
	if (isset($item)) {
		$lien .= '&item='.$item;
		if (isset($sous_item)) $lien .= '&sous_item='.$sous_item;
	} // Si l'iteme n'existe pas il n'y a pas de sous-item
	$lien .= '>';
	return $lien;
}
