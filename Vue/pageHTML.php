<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" href="Vue/base.css" />
<link rel="stylesheet" href="Vue/navigation.css" />
<?php echo '<link rel="stylesheet" href="Vue/', $STYLE, '.css" />', "\n"; ?>
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
<?php include 'Vue/menu.php'; ?>
</nav>

<section>
<?php echo $CONTENU, "\n"; ?>
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