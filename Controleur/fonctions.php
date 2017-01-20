<?php // quelques fonctions utiles
function lienHTML($param_menu, $param_sous_menu, $texte, $menu_selectionne = false) {
	if($param_sous_menu == '')
		if($menu_selectionne) 
				return '<a href ="index.php?menu='.$param_menu.'" class="menu_selectionne">'.$texte.'</a>';
		else	return '<a href ="index.php?menu='.$param_menu.'">'.$texte.'</a>';
	else		return '<a href ="index.php?menu='.$param_menu.'&ss_menu='.$param_sous_menu.'">'.$texte.'</a>';
}

function Extraire_paramètre($param) {
	if(isset($_GET[$param]))					// si le paramètre existe existe 
			return (string) $_GET[$param];	// il est converti en chaîne de caractères 
	else	return '';								// une chaîne vide sinon
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
