<?php // association dessin d'ensemble
$page = new Dessin_densemble($_SESSION[DOSSIER], $T_instruction['param1'], $T_instruction['param2']);
$page->Afficher();
