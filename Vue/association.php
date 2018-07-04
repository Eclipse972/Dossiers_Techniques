<?php
$association_image		= $T_instruction['param1'];
$association_fichier	= $T_instruction['param2'];
$association_titre		= $T_instruction['param3'];
$association_commentaire = $T_instruction['param4'];

$association = new Association_image_fichier($_SESSION[DOSSIER], $association_image, $association_fichier, $association_titre);
$association->Afficher($association_commentaire);
