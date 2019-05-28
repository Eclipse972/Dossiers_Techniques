<?php // association dessin d'ensemble
// $page = new Dessin_densemble($oSupport->Dossier(), $T_instruction['param1'], $T_instruction['param2']);
// echo $page->Code();

$page = new Page_dessin_densemble($oSupport, $T_instruction['param1'], $T_instruction['param2']);
$page->Afficher();
