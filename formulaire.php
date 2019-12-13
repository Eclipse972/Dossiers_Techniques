<?php
/*********************************************************************************************************************************** 
	formumaire de contact
************************************************************************************************************************************/
require 'Modele/classe_support.php';
require 'Modele/classe_BD.php';
require 'Modele/classe_formulaire.php';
session_start();

if (isset($_SESSION['formulaire']))
	$_SESSION['formulaire']->RAZ();
else
	$_SESSION['formulaire'] = new Formulaire;
?>

<!doctype html>
<html lang="fr">
<head>
<?php include('Vue/head_commun.html'); ?>
	<link rel="stylesheet" href="Vue/style_page.css" />
</head>

<body>

<header>
	<div id="logo"><img src="Vue/images/logo.png" alt="logo"></div>
	<div id="titre"><p class="font-effect-outline">Formulaire de contact</p></div>
</header>

<section>
<?php $_SESSION['formulaire']->Afficher(); ?>
</section>

<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
</html>
