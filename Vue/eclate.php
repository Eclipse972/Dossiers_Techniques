<?php // association éclaté
function Eclate($image, $fichier) {
$page = new Eclate($_SESSION[DOSSIER], $image, $fichier);
$page->Afficher();
}
Eclate($T_instruction['param1'], $T_instruction['param2']);
