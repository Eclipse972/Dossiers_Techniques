<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />	
	<link rel="stylesheet" href="Vue/style_erreur.css" />
	<title>Les Dossiers techniques de ChristopHe</title>
</head>

<body>
<div id="page"><!-- contient tout l'affichage -->

<header>
	<p>Une erreur est survenue !</p>
</header>

<section>
	<?php
		echo '<p>Erreur : ', $erreur, ' !</p>', "\n"; 
		// prévoir du code qui stocke les erreurs
	?>
	<p><a href="index.php">Retour à l&#145;index</a></p>
</section>

<footer>
	<?php include 'pied2page.php'; ?>
</footer>

</div>
</body>
</html>