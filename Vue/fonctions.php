<?php // quelques fonctions utiles pour l'affichage

function Ajouter_image($image, $alt, $class = null, $style = null)	{
	// ajoute l'image (avec son extension) du support courant. Cette images se trouve dans le répertoire /images.
	$image = $_SESSION[SUPPORT]->dossier.'images/'.$image;
	
	if(file_exists($image))
			echo '<img src="', $image, '"';
	else	echo '<img src="Vue/pas2photo.png"';

	if (isset($class)) echo ' class="', $class, '"';
	
	if (isset($style)) echo ' style="', $style, '"';	// pour utiliser style il faut mettre class = null

	echo ' alt="', $alt, '">';	// cette balise devient obligatoire
}

// quelques fonctions pour gérer les associations image-fichier

function Lien_image_fichier($image, $fichier, $extension, $alt) {
	$dossier = $_SESSION[SUPPORT]->dossier;
	$fichier = $fichier.$extension;
	$fichier = (file_exists($dossier.'fichiers/'.$fichier))		? $dossier.'fichiers/'.$fichier	: '#';	// si le fichier n'existe pas alors le lien est vide
	$image	= (file_exists($dossier.'images/'.$image.'.png'))	? $dossier.'images/'.$image.'.png'	: 'Vue/pas2photo.png';	// si l'image n'existe pas alors on remplace par l'image "pas de photo"
	return '<a href="'.$fichier.'"><img src="'.$image.'" alt = "'.$alt.'"></a>';
}

function Afficher_association($titre, $image, $fichier, $extension, $commentaire = '') {	// renvoie le code html pour afficher la page d'une association
	echo "\n\t<h1>", $titre, "</h1>";
	echo "\n\t<p>Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier au format eDrawing.</p>";	// message
	echo "\n\t", Lien_image_fichier($image, $fichier, $extension, $titre);	// image cliquable
	echo "\n\t<p>".$commentaire.'</p>';	// commentaire éventuel sous l'image
}
