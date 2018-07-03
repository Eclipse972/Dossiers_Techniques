<?php // association éclaté
$page = new Eclate($_SESSION[DOSSIER], $T_instruction['param1'], $T_instruction['param2']);
$page->Afficher();
