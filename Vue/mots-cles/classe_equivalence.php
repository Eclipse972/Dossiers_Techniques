<?php
/*$CE = new Classe_équivalence($oSupport->Dossier(), $T_instruction['param1'], $T_instruction['param2'], $T_instruction['param3']);
echo $CE->Code($T_instruction['param4']);*/
$nom_CE = $T_instruction['param3'];
//$image = $T_instruction['param1'];

$fichier = $T_instruction['param2']; // il contient l'extension .EASM ou .EPRT
$nom_fichier = substr($fichier, 0, strlen($fichier)-5);
$extension = substr($fichier, -5);

$page = new Page_CE($nom_CE, $nom_fichier, $extension);
$page->Afficher();
