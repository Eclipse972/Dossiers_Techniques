<?php
/*
 A propos des paramètres transmis par l'URL
 * s : identifiant du support sous for d'un nombre avec 2 chiffres maximum.
 * m : la position dans le menu transmis sous la forme d'un ou deux minuscules
 * 		la premire pour l'item et la seconde pour le sous-item
 * 		a -> 0, b->1, ...
 * Remarques:
 * - Le code ASCII de 'a' est 97
 * - une minuscule offre 26 possibilités pour item et sous-item ce qui est largement suffisant
 * - dans le BD la vue nommée Vue_code_menu utilise la même structure
 */

function Lien($texte, $support, $item = null, $sous_item = 0) { // l'existence de la page correpondante doit être vérifiée en amont
	if (isset($item)) {
		$menu = '&m='.chr($item+97);
		if ($sous_item > 0)	$menu .= chr($sous_item+97);
	} else $menu = '';
	return '<a href="pageDT.php?s='.(string)$support.$menu.'">'.$texte.'</a>';
}
