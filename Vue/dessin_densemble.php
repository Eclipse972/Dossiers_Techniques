<?php // association dessin d'ensemble
function Dessin_densemble($image, $fichier ) {
$page = new Dessin_densemble($_SESSION->Dossier(), $image, $fichier );
$page->Afficher();
}
Dessin_densemble($T_instruction['param1'], $T_instruction['param2']);
