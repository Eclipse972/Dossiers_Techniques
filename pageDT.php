<?php
/*********************************************************************************************************************************** 
	Affichage d'une page d'un support
************************************************************************************************************************************/
//la session contient un objet support dons la classe doit être appelée en premier
require 'Modele/classe_support.php';
session_start(); // On démarre la session

define(SITE, "Location: http://dossiers.techniques.free.fr/");
if (empty($_GET))	// pas de paramètre
{	$_SESSION['support'] = null; // Destruction du support en cours
	header(SITE);	// on retourne à la page d'index
	exit;			// on n'exécute pas le reste du code
} 

// le paramètre support ou menu n'a pas la forme désirée
if ((!preg_match("#^[0-9]{1,2}$#", $_GET["s"]))
 || (isset($_GET["m"]) && (!preg_match("#^[a-z]{1,2}$#", $_GET["m"]))))
{	$_SESSION['support'] = null; // Destruction du support en cours
	$_SESSION['erreur'] = 404;
	header(SITE."erreur.php");
	exit;	// on n'exécute pas le reste du code
}
// si on arrive ici c'est que les deux paramètres ont la bonne forme
require 'Modele/classe_BD.php';
require 'Controleur/liens.php';

$BD = new base2donnees();
$id	= (int)$_GET["s"];				// lecture identifiant du support
if (!$BD->Support_existe($id))		// si le support n'existe pas
{	$_SESSION['support'] = null;	// Destruction du support en cours
	$_SESSION['erreur'] = 404;
	header(SITE."erreur.php");		// page d'erreur. Le code est déjà défini
	exit;							// on n'exécute pas le reste du code
}
// a partir d'ici on sait que le support donné en paramètre existe
$_SESSION['erreur'] = null;	// donc supression du code d'erreur
require 'Modele/classe_fichier.php';
require 'Modele/classe_traceur.php';
require 'Modele/classe_page.php';

$TRACEUR = new Traceur; // voir avant dernière ligne pour affichage du rapport

if (isset($_SESSION['support'])) { // si il y a un support en cours
	if ($_SESSION['support']->ID() != $id) // changement de support?
		$_SESSION['support'] = new Support($id); // alors on en crée un nouveau
} else $_SESSION['support'] = new Support($id); // alors on le crée

// lecture des paramètres du menu
$menu		= substr((string) $_GET["m"],0,2);	// le paramètre 'm' est converti en une chaîne de 2 caractères maxi
$item		= (isset($menu[0])) ? ord($menu[0])-97: 1;
$sous_item	= (isset($menu[1])) ? ord($menu[1])-97: 0;

$_SESSION['support']->setPosition($item, $sous_item); // on met à jour a position

// création de l'objet page
$type_page = $BD->Type_page();
$Thydrate = $BD->Hydratation();

$page = new $type_page($Thydrate);
?>

<!doctype html>
<html lang="fr">
<head>
<?php include('Vue/head_commun.html'); ?>
	<link rel="stylesheet" href="Vue/styleDT.css"/>
</head>

<body>

<header>
	<div id="logo"><a href="a_propos.php"><?=$_SESSION['support']->Image()?></a></div>
	<div id="titre"><p class="font-effect-outline"><?='Dossier technique '.$_SESSION['support']->Du_support()?></p></div>
</header>

<main role="main"> <!--remarque: <main> suffit à Chrome pour tenir compte de la feuille de style.-->

<?php
define(DUREE, 8);	// durée du cache en heure
$cache = 'Vue/cache/'.$_SESSION['support']->Pti_nom().' '.(string)$_SESSION['support']->ID().'-'.(string)$_SESSION['support']->Item().'-'.(string)$_SESSION['support']->Sous_item().'.cache';
if(file_exists($cache) && (time() - filemtime($cache) < DUREE * 3600))
	readfile($cache);
else {
	ob_start();
	?>
<nav>
<?php
$T_items = $BD->Liste_item();
if(isset($T_items)) {
	echo "<ul>\n";
	foreach($T_items as $i => $item) {	// affichage du menu
		echo $item,"\n";	// lien
		// si item courant = item sélectionné et sous-menu existe alors affichage du sous-menu
		$T_sous_items = $BD->Liste_sous_item();
		if (($i == $_SESSION['support']->Item()) && isset($T_sous_items)) {
			echo "\t<ul>\n";
			foreach($T_sous_items as $sous_item)	echo "\t",$sous_item,"\n";
			echo "\t</ul>\n";
		}
	}
	echo "</ul>\n<a href=index.php>SOMMAIRE</a>\n";
} else trigger_error('Menu inexsistant: identifiant du support='.$this->ID_support."\n". E_USER_WARNING);
?>
</nav>

<section>
<?=$page->Afficher()?>
</section>

<!-- cache généré le <?=date("d/m/Y \à H:i")?>' -->
<?php
	$code = ob_get_contents();
	ob_end_clean();
	file_put_contents($cache, $code);
	echo $code;
}
?>
</main>

<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
<?php $TRACEUR->afficher_rapport();?>
</html>
