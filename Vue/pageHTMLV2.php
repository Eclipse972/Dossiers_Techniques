<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" href="Vue/styleDT.css" />
<title>Les Dossiers techniques de ChristopHe</title>
</head>

<body>
<div id="page">

<div id="logo">
<?php echo '<img src="'.$_SESSION[SUPPORT]->dossier.'images/'.$_SESSION[SUPPORT]->image.'" alt="logo">', "\n"; ?>
</div>

<header>				
<?php echo '<p>Dossier technique ', $_SESSION[SUPPORT]->du, $_SESSION[SUPPORT]->nom, "</p>\n"; ?>
</header>

<nav>					
<?php	$_SESSION[MENU]->Afficher_menu($_SESSION[ID_PAGE]);	
?>
<a href="indexV2.php">SOMMAIRE</a>
</nav>

<section>
<?php	$_SESSION[MENU]->Afficher_page($_SESSION[ID_PAGE]);	?>
</section>

<footer>				
<?php 
	include 'pied2page.php';
	echo "\n";
?>
</footer>

</div>

</body>

</html>