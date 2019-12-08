<?php
/*********************************************************************************************************************************** 
	page d'erreur
************************************************************************************************************************************/
session_start(); // On démarre la session AVANT toute chose

$code = $_SESSION['erreur'];
// dictionnaire
$dico = array(
	// erreurs de mon application
	0	=> 'Un probl&egrave;me est survenu lors de l&apos;envoi de votre message'."\n".'R&eacute;essayez plus tard!',
	// erreurs serveur
	403	=> 'Acc&egrave;s interdit',
	404	=> 'Cette page n&apos;existe pas',
	500	=> 'Serveur satur&eacute;: essayez de recharger la page'
);
if (isset($dico[$code]))
	$message = $dico[$code];
else {
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
