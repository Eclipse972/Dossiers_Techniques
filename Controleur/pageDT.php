<?php
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

$BD = new base2donnees();
$id	= (int)$_GET["s"];				// lecture identifiant du support
if (!$BD->Support_existe($id))		// si le support n'existe pas
{	$_SESSION['support'] = null;	// Destruction du support en cours
	$_SESSION['erreur'] = 404;
	header(SITE."erreur.php");		// page d'erreur
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

$type_page = $BD->Type_page();	// détermine le type de page
if (in_array($type_page, $T_pages_autorisées))
	$Thydrate = $BD->Hydratation();	// tableau contenant les paramètres d'hydratation de la page
else { // le type est inconnu ou non renseigné
	$type_page = 'Page_script';
	$Thydrate = array('script' => ''); // entraine l'affichage Désolé, il semblerai...
}
