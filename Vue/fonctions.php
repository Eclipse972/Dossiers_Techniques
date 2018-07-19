<?php // quelques fonctions utiles pour l'affichage. Ces fonctions sont utilisées par les associations image-fichier et certaines pages de certain supports
function Image($image, $dossier) { // recherche l'image dans le dossier spécifié. Si l'image n'existe pas on renvoie l'image de remplacement
	if (!strpos($image, '.')) // le fichier n'a pas d'extension
		$image .= '.png';	// alors c'est un png
	return Fichier_existe($image, $dossier,'Vue/images/pas2photo.png');
}
function Fichier($fichier, $dossier) { // recherche le fichier dans le dossier spécifié. Si le fichier n'existe pas on renvoie un lien vide
	return Fichier_existe($fichier,$dossier,'#');
}
function Fichier_existe($fichier,$dossier,$substitution) {
	if (!file_exists($fichier = $dossier.$fichier))
		$fichier = $substitution; // si le fichier n'existe pas alors on remplace par la substitution
	return $fichier;
}
function Ajouter_image($image, $alt, $class = null, $style = null)	{
	// ajoute l'image du support courant. Cette image se trouve dans le répertoire /images.
	echo '<img src="', Image($image, $_SESSION[DOSSIER].'images/', $extension),'"';
	echo (isset($class)) ? ' class="'.$class.'"' : ''; // class
	echo (isset($style)) ? ' style="'.$style.'"' : ''; // pour utiliser style il faut mettre class = null
	echo ' alt="', $alt, '">',"\n";	// cette balise devient obligatoire
}
function Page_image($titre, $texte, $image, $commentaire, $dessus, $largeur = 1000) {
	echo '<div style="width:', $largeur, 'px;margin:auto;">',"\n";
	echo '<h1>'.$titre.'</h1>',"\n";
	$texte = '<p>'.$texte.'</p>';
	/* Remarques
		mettre plusieurs paragraphes comme ceci: parag1</p><p>parag2</p><p>parag3
		mettre du code html: </p>code html. la balise fermante va créé un paragraphe vide
	*/
	if (!$dessus) echo $texte,"\n";
	Ajouter_image($image, $commentaire,'association');
	if ($dessus) echo $texte,"\n";
	echo '</div>',"\n";
}
