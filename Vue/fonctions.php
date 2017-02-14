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
