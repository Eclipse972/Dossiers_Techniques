<?php // quelques fonctions utiles pour l'affichage. Ces fonctions sont utilisées par les associations image-fichier et certaines pages de certain supports
function Image($image,$dossier) { // recherche l'image dans le dossier spécifié. Si l'image n'existe pas on renvoie l'image de remplacement
	return Fichier_existe($image,'.png',$dossier,'Vue/images/pas2photo.png');
}
function Fichier($fichier,$extension,$dossier) { // recherche le fichier dans le dossier spécifié. Si le fichier n'existe pas on renvoie un lien vide
	return Fichier_existe($fichier,$extension,$dossier,'#');
}
function Fichier_existe($fichier,$extension,$dossier,$substitution) {
	if (!file_exists($fichier = $dossier.$fichier.$extension))
		$fichier = $substitution; // si le fichier n'existe pas alors on remplace par la substitution
	return $fichier;
}
function Ajouter_image($image, $alt, $class = null, $style = null)	{
	// ajoute l'image (sans l'extension) du support courant. Cette images se trouve dans le répertoire /images.
	echo '<img src="', Image($image,$_SESSION[DOSSIER].'images/'),'"';

	if (isset($class)) echo ' class="', $class, '"'; // class

	if (isset($style)) echo ' style="', $style, '"'; // pour utiliser style il faut mettre class = null

	echo ' alt="', $alt, '">';	// cette balise devient obligatoire
}
