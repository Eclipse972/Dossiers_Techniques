<?php // quelques fonctions utiles pour l'affichage. Ces fonctions sont utilisées par les associations image-fichier et certaines pages de certain supports
function Image($image,$dossier,$extension = '.png') { // recherche l'image dans le dossier spécifié. Si l'image n'existe pas on renvoie l'image de remplacement
	return Fichier_existe($image.$extension, $dossier,'Vue/images/pas2photo.png');
}
function Fichier($fichier, $dossier) { // recherche le fichier dans le dossier spécifié. Si le fichier n'existe pas on renvoie un lien vide
	return Fichier_existe($fichier,$dossier,'#');
}
function Fichier_existe($fichier,$dossier,$substitution) {
	if (!file_exists($fichier = $dossier.$fichier))
		$fichier = $substitution; // si le fichier n'existe pas alors on remplace par la substitution
	return $fichier;
}
function Ajouter_image($image, $alt, $class = null, $style = null, $extension = '.png')	{
	// ajoute l'image du support courant. Cette image se trouve dans le répertoire /images.
	echo '<img src="', Image($image, $_SESSION[DOSSIER].'images/', $extension),'"';

	if (isset($class)) echo ' class="', $class, '"'; // class

	if (isset($style)) echo ' style="', $style, '"'; // pour utiliser style il faut mettre class = null

	echo ' alt="', $alt, '">';	// cette balise devient obligatoire
}
