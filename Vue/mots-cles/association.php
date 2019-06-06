<?php
$Tparam['image'] = $T_instruction['param1'];
$fichier_avec_extension = $T_instruction['param2'];
$Tparam['fichier'] = substr($fichier_avec_extension, 0, strlen($fichier_avec_extension)-5);
$Tparam['extension'] = substr($fichier_avec_extension, -5); // ne fonctionne pas avec une extension de logueur différente

$Tparam['titre'] = $T_instruction['param3'];
$Tparam['commentaire'] = $T_instruction['param4'];

$page = new Page_association($Tparam);
$page->Afficher();
