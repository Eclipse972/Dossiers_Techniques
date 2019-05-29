<?php // association éclaté
/* $page = new Eclate($oSupport->Dossier(), $T_instruction['param1'], $T_instruction['param2']);
echo $page->Code();*/
$page = new Page_éclaté($T_instruction['param1'], $T_instruction['param2']);
$page->Afficher();
