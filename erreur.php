<?php
/*********************************************************************************************************************************** 
	page d'erreur
************************************************************************************************************************************/
session_start(); // On démarre la session AVANT toute chose

$code = (int) $_GET['code'];
switch ($code) { // voir .htaccess
case 0:
	$message = 'Un probl&egrave;me est survenu lors de l&apos;envoi de votre message'."\n".'R&eacute;essayez plus tard!';
	break;
case 403:
	$message = 'Acc&egrave;s interdit';
	break;
case 404:
	$message = 'Cette page n&apos;existe pas';
	break;
case 500:
	$message = 'Serveur satur&eacute;: essayez de recharger la page';
	break;
default:
	$message = 'Erreur inconnue';
	$code = '';
}
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
	<div id="titre"><p class="font-effect-outline">Erreur <?=$code?></p></div>
</header>

<section>
<div style="width:600px; margin:auto;">
<p><?=$message?></p>
<a href="index.php">Retour au sommaire</a>
</div>
</section>

<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
</html>
