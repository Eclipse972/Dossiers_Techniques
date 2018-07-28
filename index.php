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
define("DU",		7);
$LISTE = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // 62 possibilités

include 'Modele/mes_classes.php';
require 'Vue/fonctions.php';
include 'Controleur/scripts.php';

session_start(); // On démarre la session AVANT toute chose

$TRACEUR = new Traceur; // voir avant dernière ligne pour affichage du rapport

Extraire_parametre($_ID, $_ITEM, $_SOUS_ITEM);

$_BD = new base2donnees();
$_SESSION = $_BD->Support($_ID); // création du support s'il existe
if (!isset($_SESSION)) { // page d'index
	$CSS = 'style_page';
	$LOGO = '<img src="Vue/images/logo.png" alt="logo">';	// mon logo
	$TITRE = 'Liste des dossiers techniques';
	$PAGE = 'listeDsupports';
}
elseif ($_ITEM > 0) { // page du dossier technique
	$CSS = 'styleDT';
	$LOGO =  Lien($_SESSION[IMAGE],$_SESSION[ID],0); // le logo est un lien la page à propos (ITEM=0)
	$TITRE = 'Dossier technique '.$_SESSION[DU];
	$PAGE = 'pageHTML';
}
else { // à propos du support
	$CSS = 'style_page';
	$LOGO =  $_SESSION[IMAGE];	// image du support
	$TITRE = '&Agrave; propos '.$_SESSION[DU];
	$PAGE = 'a_propos';
}
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:400,700&effect=outline">
	<link rel="stylesheet" href="Vue/commun.css" />
	<link rel="stylesheet" href="Vue/<?php echo $CSS; ?>.css" />
	<title>Les Dossiers techniques de ChristopHe</title>
</head>

<body>

<header>
	<div id="logo"><?php echo $LOGO;?></div>
	<div id="titre"><p class="font-effect-outline"><?php echo $TITRE; ?></p></div>
</header>

<?php include 'Vue/'.$PAGE.'.php';?>

<footer>
<?php include 'Vue/pied2page.php';?>
</footer>

</body>
<?php $TRACEUR->afficher_rapport();?>
</html>
