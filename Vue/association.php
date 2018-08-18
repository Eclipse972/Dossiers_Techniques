<?php
function Association($image, $fichier, $titre, $commentaire) {
$association = new Association_image_fichier($_SESSION->Dossier(), $image, $fichier, $titre);
$association->Afficher($commentaire);
}
Association($T_instruction['param1'], $T_instruction['param2'], $T_instruction['param3'], $T_instruction['param4']);
