<?php // association dessin d'ensemble
$page = new Dessin_de_definition($_SESSION[DOSSIER], $T_instruction['param1'], $T_instruction['param2']);
$page->Afficher();
