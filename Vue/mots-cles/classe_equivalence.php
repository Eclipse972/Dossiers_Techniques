<?php
/*$CE = new Classe_équivalence($oSupport->Dossier(), $T_instruction['param1'], $T_instruction['param2'], $T_instruction['param3']);
echo $CE->Code($T_instruction['param4']);*/
$Tparam['nom_CE'] = $T_instruction['param3'];
//$image = $T_instruction['param1'];

$fichier = $T_instruction['param2']; // il contient l'extension .EASM ou .EPRT
$Tparam['fichier'] = substr($fichier, 0, strlen($fichier)-5);
$Tparam['extension'] = substr($fichier, -5);

$page = new Page_CE($Tparam);
$page->Afficher();
