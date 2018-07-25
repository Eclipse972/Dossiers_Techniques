<?php
/*********************************************************************************************************************************** 
	contrôleur principal
************************************************************************************************************************************/
// mes constantes
define("ID",		1);
define("PTI_NOM",	2);
define("DOSSIER",	3);
define("ITEM",		4);
define("SOUS_ITEM",	5);
define("IMAGE",		6);
define("TITRE",		7);
$LISTE = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // 62 possibilités

include 'Modele/mes_classes.php';
require 'Vue/fonctions.php';
include 'Controleur/scripts.php';

session_start(); // On démarre la session AVANT toute chose

$TRACEUR = new Traceur; // voir avant dernière ligne pour affichage du rapport

Extraire_parametre($_ID, $_ITEM, $_SOUS_ITEM);

$_BD = new base2donnees();
$_SESSION = $_BD->Support($_ID); // création du support s'il existe
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:400,700&effect=outline">
	<link rel="stylesheet" href="Vue/commun.css" />
	<link rel="stylesheet" href="Vue/<?php echo (isset($_SESSION)) ? 'styleDT' : 'style_liste'; ?>.css" />
	<title>Les Dossiers techniques de ChristopHe</title>
</head>

<body>

<header>
	<div id="logo">
	<?php
		if (isset($_SESSION))
			echo '<a href="#">',$_SESSION[IMAGE],'</a>'; // le logo est un lien vide pour le moment
		else echo'<img src="Vue/images/logo.png" alt="logo">';
	?>
	</div>
	<div id="titre">
	<p class="font-effect-outline"><?php echo (isset($_SESSION)) ? $_SESSION[TITRE] : 'Liste des dossiers techniques'; ?></p>
	</div>
</header>

<?php
	if (isset($_SESSION))
		include 'Vue/pageHTML.php';
	else
		include 'Vue/listeDsupports.php';
?>
<footer>
<?php	include 'Vue/pied2page.php'; ?>
</footer>

</body>
<?php $TRACEUR->afficher_rapport(); ?>
</html>
