<?php
/*********************************************************************************************************************************** 
	formumaire de contact
************************************************************************************************************************************/
require 'Modele/classe_support.php';
require 'Modele/classe_BD.php';
require 'Modele/classe_formulaire.php';
session_start(); // On démarre la session AVANT toute chose

//require 'Modele/classe_fichier.php';
//require 'Controleur/liens.php';

// $BD = new base2donnees();
if (isset($_SESSION['formulaire']))
	$_SESSION['formulaire']->MAJ();	// simple mise à jour
else
	$_SESSION['formulaire'] = new Formulaire;

// contexte
/*if (isset($_SESSION['support'])) {
	if ($_SESSION['support']->ID() > 0)
		$objet = 'exemple :'.$BD->Texte_item($_SESSION['support']->ID(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item()).'&raquo; '.$_SESSION['support']->Du_support();
	else
		$objet = 'l&apos;archive ZIP';
} else	$objet = 'la liste de supports';*/
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
