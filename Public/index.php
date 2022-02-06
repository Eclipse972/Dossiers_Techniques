<?php	// routeur de PEUNC
session_start();

require_once"PEUNC/classes/Page.php";
require_once"PEUNC/classes/RouteurHttp.php";
require_once"PEUNC/classes/ReponseClient.php";
require_once"PEUNC/classes/BDD.php";

// autoloader pour les classes utilisateur
spl_autoload_register(function($classe)	{ require_once"Modele/classe_{$classe}.php"; });

try
{
	// BD disponible comme variable globale
	$BD = new PEUNC\BDD;

	// à partir d'une requête Http on trouve la route
	$route = new PEUNC\HttpRouter;

	// construction de la réponse en fonction de la route trouvée
	$reponse = new PEUNC\ReponseClient($route);
}
catch(Exception $e)
{
	$PAGE = new PageErreur;
	$PAGE->setCodeErreur("application");
	$PAGE->setTitreErreur($e->getMessage());
	$PAGE->setCorpsErreur("<p>Noeud {$route->getAlpha()} - {$route->getBeta()} - {$route->getGamma()}</p>");
	include $PAGE->getView(); // insertion de la vue
}
