<?php 
// echo $oSupport->Générer_page_image($T_instruction);
$Tparam['titre'] = $T_instruction['param1'];
$Tparam['image'] = $T_instruction['param2'];
$Tparam['commentaire'] = $T_instruction['param3'];
$Tparam['hauteur'] = $T_instruction['param4'];

$page = new Page_image_dessous($Tparam);
$page->Afficher();
