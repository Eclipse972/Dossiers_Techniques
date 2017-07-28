<?php // quelques fonctions utiles pour l'affichage
function Image($image,$dossier) { // recherche l'image dans le dossier spécifié. Si l'image n'existe pas on renvoie l'image de remplacement
	//echo 'parmètres: ', $image, ' et ', $dossier;
	$image = $dossier.'images/'.$image.'.png';
	if (!file_exists($image))
		$image = 'Vue/pas2photo.png'; // si l'image n'existe pas alors on remplace par l'image "pas de photo"
	return $image;
}
function Fichier($fichier,$extension,$dossier) { // recherche l'image dans le dossier spécifié. Si l'image n'existe pas on renvoie l'image de remplacement
	$fichier = $dossier.'fichiers/'.$fichier.$extension;
	if (!file_exists($fichier))
		$fichier = '#'; // si le fichier n'existe pas alors on remplace par #
	return $fichier;
}

function Ajouter_image($image, $alt, $class = null, $style = null)	{
	// ajoute l'image (sans l'extension) du support courant. Cette images se trouve dans le répertoire /images.
	echo '<img src="', Image($image,$_SESSION[SUPPORT]->dossier),'"';

	if (isset($class)) echo ' class="', $class, '"'; // class
	
	if (isset($style)) echo ' style="', $style, '"'; // pour utiliser style il faut mettre class = null

	echo ' alt="', $alt, '">';	// cette balise devient obligatoire
}

// quelques fonctions pour gérer les associations image-fichier

function Lien_image_fichier($image, $fichier, $extension, $alt) {
	return '<a href="'.Fichier($fichier,$extension,$_SESSION[SUPPORT]->dossier).'"><img src="'.Image($image, $_SESSION[SUPPORT]->dossier).'" alt = "'.$alt.'"></a>';
}

function Afficher_association($titre, $image, $fichier, $extension, $commentaire = '') {	// renvoie le code html pour afficher la page d'une association
	echo "\n<h1>", $titre, "</h1>";
	echo "\n<p>Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier au format eDrawing.</p>";	// message
	echo "\n", Lien_image_fichier($image, $fichier, $extension, $titre);	// image cliquable
	echo "\n<p>".$commentaire."</p>\n";	// commentaire éventuel sous l'image
}
