<?php
$image = $T_instruction['param1'];
$fichier = $T_instruction['param2'];

$page = new Page_dessin_densemble($image, $fichier);
$page->Afficher();
