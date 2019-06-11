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

if (!preg_match("#^[a-zA-Z0-9]{1,3}$#", $_GET["p"]))	// le paramètre n'a pas la forme désirée
{	$_SESSION['support'] = null;						// Destruction du support en cours
	header(SITE."erreur.php?code=404");					// page d'erreur
	exit;												// on n'exécute pas le reste du code
}
// si on arrive ici c'est que le paramètre a la bonne forme
require 'Modele/classe_BD.php';
require 'Controleur/liens.php';

$BD = new base2donnees();
list($id, $item, $sous_item) = Lire_parametre("p", -1, 1);
if (!$BD->Support_existe($id))			// si le support n'existe pas
{	$_SESSION['support'] = null;		// Destruction du support en cours
	header(SITE."erreur.php?code=404");	// page d'erreur
	exit;								// on n'exécute pas le reste du code
}
// si on arrive ici c'est que le support donné en paramètre existe

require 'Modele/classe_fichier.php';
require 'Modele/classe_menu.php';
require 'Modele/classe_traceur.php';
require 'Modele/classe_page.php';

$TRACEUR = new Traceur; // voir avant dernière ligne pour affichage du rapport

if (isset($_SESSION['support'])) { // si il y a un support en cours
	if ($_SESSION['support']->ID() != $id) // changement de support?
		$_SESSION['support'] = new Support($id); // alors on en crée un nouveau
} else $_SESSION['support'] = new Support($id); // alors on le crée
$_SESSION['support']->setPosition($item, $sous_item); // on met à jour a position

$menu = new Menu($_SESSION['support']->Id(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item()); // création menu

// création de l'objet page
$BD = new base2donnees();
$type_page = $BD->Type_page($_SESSION['support']->Id(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item());

$BD = new base2donnees();
$Thydrate = $BD->Hydratation($_SESSION['support']->Id(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item());
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
define(DUREE, 0);	// durée du cache en heure
$cache = 'Vue/cache/'.$_SESSION['support']->Pti_nom().' '.Creer_parametre($_SESSION['support']->ID(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item()).'.cache';
if(file_exists($cache) && (time() - filemtime($cache) < DUREE * 3600))
	readfile($cache);
else {
	ob_start();
	?>
<nav>
<?=$menu->Afficher()?>
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
