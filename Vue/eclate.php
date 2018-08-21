<?php // association éclaté
$page = new Eclate($_SESSION->Dossier(), $T_instruction['param1'], $T_instruction['param2']);
echo $page->Code();
