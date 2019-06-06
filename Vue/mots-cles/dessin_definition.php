<?php // association dessin d'ensemble
$Tparam['image'] = $T_instruction['param1'];
$Tparam['fichier'] = $T_instruction['param2'];
$Tparam['titre'] = ''; // non défini dans la version actuelle

$page = new Page_dessin2définition($Tparam);
$page->Afficher();
