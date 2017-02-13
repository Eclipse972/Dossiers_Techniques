<?php // quelques fonctions pour gérer les associations image-fichier

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
