<?php // quelques fonctions utiles

function Lien_image_fichier($dossier, $image, $fichier = null, $extension = '.EPRT') {
	$fichier = (isset($fichier)) ? $fichier.$extension : $image.$extension;
	$fichier =	(file_exists($dossier.'pieces/'.$fichier))		? $dossier.'pieces/'.$fichier		: '#';					// si le fichier n'existe pas alors le lien est vide
	$image	 = 	(file_exists($dossier.'images/'.$image.'.png'))	? $dossier.'images/'.$image.'.png'	: 'Vue/pas2photo.png';	// si l'image n'existe pas alors on remplace par l'image "pas de photo"
	return '<a href="'.$fichier.'"><img src="'.$image.'"></a>';	// prévoir texte alternatif $code .= 'alt ="'. ?? .'"></a>';
}

function Afficher_association($titre, $lien,$commentaire = null) {	// renvoie le code html pour afficher la page d'une association
	echo "\n\t<h1>", $titre, "</h1>";
	echo "\n\t<p>Cliquez sur l&#145;image pour t&eacute;l&eacute;charger le fichier au format eDrawing.</p>";	// message
	echo "\n\t", $lien;	// image cliquable
	if (isset($commentaire))	echo "\n\t<p>".$commentaire.'</p>';	// commentaire éventuel sous l'image

}

function Afficher_dessin_densemble() {
	Afficher_association('Dessin d&#145;ensemble','');	
}

function Afficher_eclate() {
	Afficher_association('&Eacute;clat&eacute;','');
}

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
