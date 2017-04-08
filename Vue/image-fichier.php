<?php // quelques fonctions pour gérer les associations image-fichier

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
	echo "\n\t", Lien_image_fichier($image, $fichier, $extension );	// image cliquable
	echo "\n\t<p>".$commentaire.'</p>';	// commentaire éventuel sous l'image
}
