<?php // association dessin d'ensemble
function Dessin2definition($image, $fichier) {
$page = new Dessin_de_definition($_SESSION->Dossier(), $image, $fichier);
$page->Afficher();
}
Dessin2definition($T_instruction['param1'], $T_instruction['param2']);
