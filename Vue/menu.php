<?php
echo "<ul>\n";
foreach($_SESSION[MENU] as $item => $texte) {
	echo "<li>";

	if($item == $param_menu) {	// le menu courant est égale au paramètre menu
		// affichage de l'item
		if(isset($_SESSION[SUPPORT]->sous_menu[$param_menu][$param_sous_menu]))	// si un sous-menu est sélectionné
				echo lienHTML($item,'',$texte, true);		// on affiche le lien du menu ave la couleur d'un menu sélectionné
		else	echo $texte;	// affichage du texte sans lien

		if(isset($_SESSION[SUPPORT]->sous_menu[$item])) {	// le menu courant a un sous-menu ?
			echo "\n\t<ul>\n";			// on crée la sous-liste
			foreach($_SESSION[SUPPORT]->sous_menu[$item] as $sous_item => $sous_texte) {	// on parcours le sous-menu
				echo "\t<li>";
				if($sous_item == $param_sous_menu)	// le sous-menu courant est égale au paramètre sous-menu
						echo $sous_texte;					// affichage du sous-menu sans lien
				else	echo lienHTML($item, $sous_item, $sous_texte);	// affichage du sous-menu avec lien
				echo "</li>\n";
			}
			echo "\t</ul>\n\t";
		}
	}
	else echo lienHTML($item,'',$texte); // on affiche le lien du menu
	echo "</li>\n";
}
echo "</ul>\n";
echo '<a href="index.php">SOMMAIRE</a>', "\n"; // lien vers le sommaire

