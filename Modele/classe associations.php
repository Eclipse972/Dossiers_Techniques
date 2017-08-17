<?php
class association_image_fichier {
var $image;
var $fichier;
var $dossier;

function association_image_fichier($dossier, $image, $fichier, $extension) { // constructeur
	$this->image = Image($dossier, $image);
	$this->fichier = Fichier($dossier, $fichier, $extension);
	$this->dossier = $dossier;
}

}
?>
