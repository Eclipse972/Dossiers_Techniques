<?php
/*
 A propos des paramètres transmis par l'URL
 * s : identifiant du support sous for d'un nombre avec 2 chiffres maximum.
 * m : la position dans le menu transmis sous la forme d'un ou deux minuscules
 * 		la premire pour l'item et la seconde pour le sous-item
 * 		a -> 0, b->1, ...
 * Remarque:
 * - Le code ASCII de 'a' est 97
 * - une minuscule offre 26 possibilités pour item et sous-item ce qui est largement suffisant
 */

function Lien($texte, $support, $item = null, $sous_item = null) { // l'existence de la page correpondante doit être vérifiée en amont
	$parametre = 's='.(string)$support;
	if (isset($item)) {
		$parametre .= '&m='.chr($item+97);
		if (isset($sous_item))	$parametre .= chr($sous_item+97);
	}
	return '<a href="pageDT.php?'.$parametre.'">'.$texte.'</a>';
}
