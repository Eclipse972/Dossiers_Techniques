<?php
include '../Controleur/liens.php';
Extraire_parametre($id, $item, $sous_item);
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
<div id="titre"><p class="font-effect-outline">Me contacter</p></div>
</header>

<section>
<h1>Page en contruction</h1>
<?php
echo 'origine ', $id, '-', $item, '-', $sous_item, "\n";
?>
<a href="javascript:history.back()">Page pr&eacute;c&eacute;dente</a>
</section>

<footer>
<p>Site optimis&eacute; pour <img src="images/chrome.png" alt="Chrome"> et <img src="images/firefox.png" alt="Firefox">
 - derni&egrave;re mise à jour: 24 ao&ucirc;t 2018</p>
</footer>

</body>
</html>
