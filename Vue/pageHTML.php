<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" href="Vue/styleDT.css" />
<title>Les Dossiers techniques de ChristopHe</title>
<?php
require 'Vue/image-fichier.php';	// fonctions pour l'affichage des associations image-fichier
require 'Vue/fonctions.php';		// fonctions diverses pour l'affichage
?>
</head>

<body>
<div id="page">

<div id="logo">
<?php echo '<img src="'.$_SESSION[SUPPORT]->dossier.'images/'.$_SESSION[SUPPORT]->image.'" alt="logo">', "\n"; ?>
</div>

<header> <?php echo '<p>Dossier technique ', $_SESSION[SUPPORT]->du, $_SESSION[SUPPORT]->nom, "</p>\n"; ?>
</header>

<nav>					
<?php	$_SESSION[MENU]->Afficher_menu($_SESSION[ID_PAGE]); ?>
<a href="index.php">SOMMAIRE</a>
</nav>

<section>
<?php	
	$script = (isset($_SESSION[MENU]->T_page[$_SESSION[ID_PAGE]])) ? $_SESSION[MENU]->T_page[$_SESSION[ID_PAGE]] : 'erreur 404'; //
	$dossier = $_SESSION[SUPPORT]->dossier;
	// variables pour les associations image-fichier
	$image = '';
	$fichier = '';
	
	switch($script) {	// on  regarde si script est un mot réservé
		case 'erreur 404' :
			echo '<h1>Page introuvable</h1>';
			break;
		case 'eclate':
			Afficher_eclate();
			break;
		case 'dessin_densemble':
			Afficher_dessin_densemble();
			break;
		case 'nomenclature': 
			include 'Vue/nomenclature.php';
			break;
		default:	// ce n'est pas un mot réservé
			include $dossier.$script.'.php';
	}
?>
</section>

<footer> <?php	include 'pied2page.php'; ?>
</footer>

</div>

</body>

</html>
