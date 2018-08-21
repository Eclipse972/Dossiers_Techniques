<?php // association dessin d'ensemble
$page = new Dessin_densemble($_SESSION->Dossier(), $T_instruction['param1'], $T_instruction['param2']);
echo $page->Code();
