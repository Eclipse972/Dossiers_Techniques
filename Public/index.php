<?php	// routeur de PEUNC
session_start();

spl_autoload_register(function($classe)
	{
		if (substr($classe, 0, 5) == "PEUNC")
		{	// PEUNC
			$classe = substr($classe, 6, 99);
			$prefixe = "PEUNC/classes/";
		}
		else $prefixe =  "Modele/classe_"; // utilisateur

		require_once $prefixe . $classe . ".php";
	}
);

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
	$PAGE = new PageErreur($route->getAlpha(), $route->getBeta(), $route->getGamma(), "GET");
	$PAGE->setCodeErreur("application");
	$PAGE->setTitreErreur($e->getMessage());
	$PAGE->setCorpsErreur("");
	include $PAGE->getView(); // insertion de la vue
}
