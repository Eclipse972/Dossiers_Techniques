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
function Ajouter_image($image, $alt, $supplement = null)	{
	// ajoute l'image du support courant. Cette image se trouve dans le répertoire /images.
	echo '<img src="', Image($image, $_SESSION->Dossier().'images/'),'"';
	echo (isset($supplement)) ? ' '.$supplement : ''; // supplément : class=... et/ou style=...
	echo ' alt="', $alt, '">',"\n";	// cette balise devient obligatoire
}
function Page_image($titre, $texte, $image, $commentaire, $dessus, $hauteur) {
	echo '<div id="page_image">',"\n";
	echo '<h1>'.$titre.'</h1>',"\n";
	$texte = ($texte != '') ? '<p>'.$texte.'</p>'."\n" : '';
	/* Remarques
		mettre plusieurs paragraphes comme ceci: parag1</p><p>parag2</p><p>parag3
		mettre du code html: </p>code html<p>. les balises qui entourent le code vont créé 2 paragraphes vides
	*/
	if (!$dessus) echo $texte;
	if ($hauteur == '')	$hauteur= 400;
	Ajouter_image($image, $commentaire,'class="association" style=height:'.$hauteur.'px;');
	if ($dessus) echo $texte;
	echo '</div>',"\n";
}
