<?php
$image = $T_instruction['param1'];
$fichier = $T_instruction['param2'];

$page = new Page_éclaté($image, $fichier);
$page->Afficher();
