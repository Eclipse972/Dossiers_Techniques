<?php // association éclaté
function Eclate($image, $fichier) {
$page = new Eclate($_SESSION->Dossier(), $image, $fichier);
$page->Afficher();
}
Eclate($T_instruction['param1'], $T_instruction['param2']);
