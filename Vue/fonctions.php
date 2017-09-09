<?php // quelques fonctions utiles pour l'affichage. Ces fonctions sont utilisées par les associations image-fichier et certaines pages de certain supports
define (PAS2PHOTO, 'Vue/images/pas2photo.png');

function Image($image,$dossier) { // recherche l'image dans le dossier spécifié. Si l'image n'existe pas on renvoie l'image de remplacement
	if (!file_exists($image = $dossier.$image.'.png'))
		$image = PAS2PHOTO; // si l'image n'existe pas alors on remplace par l'image "pas de photo"
	return $image;
}
function Fichier($fichier,$extension,$dossier) { // recherche l'image dans le dossier spécifié. Si l'image n'existe pas on renvoie l'image de remplacement
	if (!file_exists($fichier = $dossier.'fichiers/'.$fichier.$extension))
		$fichier = '#'; // si le fichier n'existe pas alors on remplace par #
	return $fichier;
}

function Ajouter_image($image, $alt, $class = null, $style = null)	{
	// ajoute l'image (sans l'extension) du support courant. Cette images se trouve dans le répertoire /images.
	echo '<img src="', Image($image,$_SESSION[SUPPORT]->dossier.'images/'),'"';

	if (isset($class)) echo ' class="', $class, '"'; // class

	if (isset($style)) echo ' style="', $style, '"'; // pour utiliser style il faut mettre class = null

	echo ' alt="', $alt, '">';	// cette balise devient obligatoire
}
