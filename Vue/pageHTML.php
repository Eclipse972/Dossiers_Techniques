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

<div id="logo">	<?php $_SESSION[SUPPORT]->Image(); ?>				</div>
<header>				<?php $_SESSION[SUPPORT]->Titre(); ?>				</header>
<nav>					<?php	$_SESSION[SUPPORT]->Afficher_menu(); ?>	</nav>

<section>
<?php	
	$script = (isset($_SESSION[SUPPORT]->menu->T_page[$_SESSION[ID_PAGE]])) ? $_SESSION[SUPPORT]->menu->T_page[$_SESSION[ID_PAGE]] : 'erreur 404'; //
	// variables pour les associations image-fichier
	$image = '';
	$fichier = '';
	
	switch($script) {	// on  regarde si script est un mot réservé
		case 'erreur 404' :
			echo '<h1>Page introuvable</h1>';
			break;
		case 'eclate':
			$_SESSION[SUPPORT]->Afficher_eclate();
			break;
		case 'dessin_densemble':
			$_SESSION[SUPPORT]->Afficher_dessin_densemble();
			break;
		case 'nomenclature': 
			include 'Vue/nomenclature.php';
			break;
		default:	// ce n'est pas un mot réservé
			$_SESSION[SUPPORT]->Execute($script);
	}
?>
</section>

<footer> <?php	include 'pied2page.php'; ?></footer>

</div>

</body>

</html>
