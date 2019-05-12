<?php
/*********************************************************************************************************************************** 
	page à propos d'un support
************************************************************************************************************************************/
session_start(); // On démarre la session AVANT toute chose

require 'Modele/classe_associations.php';
require 'Modele/classe_fichier.php';
require 'Controleur/liens.php';
require 'Modele/classe_BD.php';
require 'Modele/classe_support.php';

$oSupport = unserialize($_SESSION['support']);

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
	<div id="titre"><p class="font-effect-outline">A propos <?=$oSupport->Du_support() ?></p></div>
</header>

<section>
<?php
echo $oSupport->A_propos();
echo Lien('Retour au dossier technique '.$oSupport->Du_support(),$oSupport->ID());
?>
</section>

<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
</html>
