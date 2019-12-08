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
	$parametre = 's='.(string)$param1;
	if (isset($param2)) {
		$parametre .= '&m='.chr($param2+97);
		if (isset($param3))	$parametre .= chr($param3+97);
	}
	return '<a href="pageDT.php?'.$parametre.'">'.$texte.'</a>';
}
