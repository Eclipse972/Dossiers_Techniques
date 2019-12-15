<?php
/*********************************************************************************************************************************** 
	Affiche la liste des supports
************************************************************************************************************************************/
session_start(); // On démarre la session AVANT toute chose

require 'Modele/classe_fichier.php';
require 'Modele/classe_BD.php';
require 'Modele/classe_support.php';
require 'Controleur/liens.php';

define(DUREE, 8);	// durée du cache en heure
define(CACHE, 'Vue/cache/index.cache');	// nom du fichier cache

$_SESSION['support'] = null;	// on détruit le support en cours
?>
<!doctype html>
<html lang="fr">
<head>
<?php include('Vue/head_commun.html'); ?>
	<link rel="stylesheet" href="Vue/index.css"/>
</head>

<body>

<header>
	<div id="logo"><img src="Vue/images/logo.png" alt="logo"></div>
	<div id="titre"><p class="font-effect-outline">Liste des dossiers techniques</p></div>
</header>

<section>
<h1>Cliquez sur l&apos;image ou le nom du support pour acc&eacute;der &agrave; son dossier technique</h1>
<table>
<?php
if(file_exists(CACHE) && (time() - filemtime(CACHE) < DUREE * 3600))
	readfile(CACHE);
else {	// création du code sans utiliser le tampon de PHP
	$BD = new base2donnees();	// accès à la base de données
	$code = $BD->Gerer_index(5);// récupère et agrège le code
	$code .=  '<!-- cache généré le '.date("d/m/Y \à H:i").' -->'."\n";
	file_put_contents(CACHE, $code);
	echo $code;
}
?>
</table>
</section>
<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
</html>
