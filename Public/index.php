<?php	// routeur de PEUNC
session_start();

require 'PEUNC/classes/Page.php';
require 'PEUNC/classes/BDD.php';
require 'PEUNC/classes/RequeteHttp.php';

// autoloader pour les classes utilisateur
spl_autoload_register(
	function($classe)
	{
		require_once"Modele/classe_{$classe}.php";
	}
);

try
{
	$requete = new PEUNC\HttpRequest;

	$BD = new PEUNC\BDD;

	$classePage = $BD->ClassePage($requete->getAlpha(), $requete->getBeta(), $requete->getGamma());
	if (!isset($classePage))	throw new Exception("La classe de page n&apos;est pas d&eacute;finie dans le squelette.");

	PEUNC\Page::SauvegardeEtat();	// sauvegarde de l'état courant
	list($_SESSION["PEUNC"]['alpha'], $_SESSION["PEUNC"]['beta'], $_SESSION["PEUNC"]['gamma']) = [$requete->getAlpha(), $requete->getBeta(), $requete->getGamma()];// MAJ de l'état'
	// $_SESSION = array(...) détruirait les autres éventuels paramètres stockés dans la session

	//require"Modele/classe_{$classePage}.php";
	$PAGE = new $classePage(explode("/", $paramPage));
	$PAGE->ExecuteControleur($_SESSION["PEUNC"]['alpha'], $_SESSION["PEUNC"]['beta'], $_SESSION["PEUNC"]['gamma']);
}
catch(Exception $e)
{
	//require"Modele/classe_PageErreur.php";
	$PAGE = new PageErreur;
	$PAGE->setCodeErreur("application");
	$PAGE->setTitreErreur($e->getMessage());
	$PAGE->setCorpsErreur("<p>Noeud {$requete->getAlpha()} - {$requete->getBeta()} - {$requete->getGamma()}</p>");
}

include $PAGE->getView(); // insertion de la vue
