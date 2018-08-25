<?php
/*********************************************************************************************************************************** 
	contrôleur principal
************************************************************************************************************************************/
require 'Modele/classe_associations.php';
require 'Modele/classe_fichier.php';
require 'Modele/classe_BD.php';
require 'Modele/classe_menu.php';
require 'Modele/classe_traceur.php';
require 'Modele/classe_support.php';
include 'Controleur/liens.php';

session_start(); // On démarre la session AVANT toute chose

$TRACEUR = new Traceur; // voir avant dernière ligne pour affichage du rapport
$_BD = new base2donnees();
$VIE_DU_CACHE = 0; // en heure. Mettre à zéro lorsque j'interviens sur le site
Extraire_parametre($_ID, $_ITEM, $_SOUS_ITEM);
$_SESSION = ($_BD->Support_existe($_ID)) ? new Support($_ID, $_BD) : null; // création du support s'il existe
// les scénari possibles
if (!isset($_SESSION)) { // page d'index
	$CSS = 'style_page';
	$LOGO = '<img src="Vue/images/logo.png" alt="logo">';	// mon logo
	$TITRE = 'Liste des dossiers techniques';
	$PAGE = 'listeDsupports';
	$CACHE = 'index';
}
elseif ($_ITEM > 0) { // page du dossier technique
	$CSS = 'styleDT';
	$LOGO =  Lien($_SESSION->Image(),$_SESSION->ID(),0,0); // le logo est un lien la page à propos (ITEM=0)
	$TITRE = 'Dossier technique '.$_SESSION->Du_support();
	$PAGE = 'pageHTML';
	$_SESSION->setPosition($_ITEM, $_SOUS_ITEM);
	$CACHE = $_SESSION->Pti_nom().' '.$_SESSION->ID().'-'.$_SESSION->Item().'-'.$_SESSION->Sous_item();
}
elseif (($_ITEM == 0) && ($_SOUS_ITEM == 0)) { // à propos du support
	$CSS = 'style_page';
	$LOGO =  $_SESSION->Image();	// image du support
	$TITRE = '&Agrave; propos '.$_SESSION->Du_support();
	$PAGE = 'a_propos';
	$_SESSION->setPosition(0, 0);
	$CACHE = 'a propos '.$_SESSION->Pti_nom().' '.$_SESSION->ID(); // deux support peuvent avoir le même pti nom
}
elseif (($_ITEM == 0) && ($_SOUS_ITEM == 1)) { // formulaire de contact relatif à une des pages du support
	$CSS = 'style_page';
	$LOGO = '<img src="Vue/images/logo.png" alt="logo">';	// mon logo
	$TITRE = 'Formulaire de contact';
	$PAGE = 'me_contacter';
	$_SESSION->setPosition(0, 1);
	$CACHE = 'formulaire';
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

<?php
$CACHE = 'Vue/cache/'.$CACHE.'.cache';
if(file_exists($CACHE) && (time() - filemtime($CACHE) < $VIE_DU_CACHE * 3600))
	readfile($CACHE);
else {
	ob_start();
	include 'Vue/'.$PAGE.'.php';
	echo '<!-- cache généré le ', date("d/m/Y \à H:i"),' -->', "\n";
	$code = ob_get_contents();
	ob_end_clean();
	file_put_contents($CACHE, $code);
	echo $code;
}
?>
<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
<?php $TRACEUR->afficher_rapport();?>
</html>
