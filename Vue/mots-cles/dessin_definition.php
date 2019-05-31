<?php // association dessin d'ensemble
$image = $T_instruction['param1'];
$fichier = $T_instruction['param2'];

$page = new Page_dessin2définition('', $image, $fichier);
$page->Afficher();
