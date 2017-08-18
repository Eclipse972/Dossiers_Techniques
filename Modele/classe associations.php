<?php
class Association_image_fichier {
var $image;
var $fichier;

function Association_image_fichier($dossier, $image, $fichier, $extension) { // constructeur
	$this->image = Image($dossier, $image);
	$this->fichier = Fichier($dossier, $fichier, $extension);
}
function Afficher($titre, $image_alt, $commentaire = '') {
	// si		l'image n'existe pas		  et le fichier n'existe pas
	if (($this->image == 'Vue/pas2photo.png') && ($this->fichier == '#'))
		include 'Vue/en_construction.php'; // alors on charge la page "en construction"
	else {
		echo "\n", '<h1>', $titre, '</h1>';
		echo "\n", '<p>Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>';	// message
		echo "\n", '<a href="', $this->fichier, '">';	// lien vers le fichier
		echo '<img src="', $this->image, '" alt = "', $image_alt, '"></a>';	// image avec texte alternatif
		echo "\n", '<p>', $commentaire, '</p>', "\n";	// commentaire éventuel sous l'image
	}
}
}
// classes filles
class Dessin_densemble extends Association_image_fichier {
}

class Eclate extends Association_image_fichier {
}
?>
