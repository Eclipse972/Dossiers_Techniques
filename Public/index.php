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
	// à partir d'une requête Http on trouve la route
	$route = new PEUNC\HttpRouter;

	PEUNC\Page::SauvegardeEtat($route);	// sauvegarde de l'état courant

	$MethodesSupportées = array(
		"GET"	=> "PEUNC\ReponseGET",
		"POST"	=> "PEUNC\ReponsePOST"	// pour le moment
	);
	if (isset($MethodesSupportées[$route->getMethode()]))
		$ReponseClient = $MethodesSupportées[$route->getMethode()];
	else throw new \Exception("M&eacute;thode Http inconnue : " . $route->getMethode());

	// construction de la réponse en fonction de la route trouvée
	$reponse = new $ReponseClient($route);
}
catch(Exception $e)
{
	$PAGE = new PEUNC\Erreur($route->getAlpha(), $route->getBeta(), $route->getGamma(), "GET");
	$PAGE->setTitle("Les dossiers techniques de ChristopHe");
	$PAGE->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe</p>");
	$PAGE->setCodeErreur("application");
	$PAGE->setTitreErreur($e->getMessage());
	$PAGE->setCorpsErreur("");
	$PAGE->setCSS(array("erreur"));
	$PAGE->setView("erreur.html");
	include $PAGE->getView(); // insertion de la vue
}
