<?php // quelques fonctions pour gérer les associations image-fichier

function Lien_image_fichier($image, $fichier = null, $extension = '.EPRT') {
	$dossier = $_SESSION[SUPPORT]->dossier;
	$fichier = (isset($fichier)) ? $fichier.$extension : $image.$extension;
	$fichier = (file_exists($dossier.'pieces/'.$fichier))		? $dossier.'pieces/'.$fichier		: '#';	// si le fichier n'existe pas alors le lien est vide
	$image	= (file_exists($dossier.'images/'.$image.'.png'))	? $dossier.'images/'.$image.'.png'	: 'Vue/pas2photo.png';	// si l'image n'existe pas alors on remplace par l'image "pas de photo"
	return '<a href="'.$fichier.'"><img src="'.$image.'"></a>';	// prévoir texte alternatif $code .= 'alt ="'. ?? .'"></a>';
}

function Afficher_association($titre, $lien,$commentaire = null) {	// renvoie le code html pour afficher la page d'une association
	echo "\n\t<h1>", $titre, "</h1>";
	echo "\n\t<p>Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier au format eDrawing.</p>";	// message
	echo "\n\t", $lien;	// image cliquable
	if (isset($commentaire))	echo "\n\t<p>".$commentaire.'</p>';	// commentaire éventuel sous l'image
}

function Afficher_dessin_densemble($image = null, $fichier = null) {
	if (!isset($image))	// nom par défaut dessin_support.png
		$image = 'dessin_'.$_SESSION[SUPPORT]->pti_nom;
	if (!isset($fichier))	// nom par défaut: support.EDRW
		$fichier = $_SESSION[SUPPORT]->pti_nom;
	$lien = Lien_image_fichier($image, $fichier, '.EDRW');
	Afficher_association('Dessin d&apos;ensemble', $lien);	
}

function Afficher_eclate($image = null, $fichier = null) {
	if (!isset($image))	// nom par défaut eclate_support.png
		$image = 'eclate_'.$_SESSION[SUPPORT]->pti_nom;
	if (!isset($fichier))	// nom par défaut: support.EASM
		$fichier = $_SESSION[SUPPORT]->pti_nom;
		
echo '<!-- image =',$image,"-->\n";
	$lien = Lien_image_fichier($image, $fichier, '.EASM');
	Afficher_association('&Eacute;clat&eacute;', $lien);
}
