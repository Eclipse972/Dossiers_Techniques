<?php
$code = (int) $_GET['code'];
switch ($code) {
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
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:400,700&effect=outline">
	<link rel="stylesheet" href="commun.css" />
	<title>Les Dossiers techniques de ChristopHe</title>
</head>

<body>

<header>
<div id="logo"><?php echo'<img src="images/logo.png" alt="logo">'; ?></div>
<div id="titre"><p class="font-effect-outline">ERREUR <?php echo $code; ?></p></div>
</header>

<section>
<?php
echo '<p>', $message, ' !</p>', "\n";
echo '<a href="../index.php">Retour au sommaire</a> ou <a href="javascript:history.back()">Page pr&eacute;c&eacute;dente</a>';
?>
</section>

<footer>
<?php include 'pied2page2.php'; ?>
</footer>

</body>
</html>
