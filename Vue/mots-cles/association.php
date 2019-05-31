<?php
/*$association = new Association_image_fichier($oSupport->Dossier(), $T_instruction['param1'], $T_instruction['param2'], $T_instruction['param3']);
echo $association->Code($T_instruction['param4']);*/
$image = $T_instruction['param1'];
$fichier = $T_instruction['param2'];
$nom_fichier = substr($fichier, 0, strlen($fichier)-5);
$extension = substr($fichier, -5);

$titre = $T_instruction['param3'];
$commentaire = $T_instruction['param4'];

$page = new Page_association_image_fichier($image, '.png', $nom_fichier, $extension);
$page->Dénommer($titre);
$page->Afficher($commentaire);
