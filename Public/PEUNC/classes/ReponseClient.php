<?php
namespace PEUNC;

require_once"PEUNC/classes/BDD.php";
require_once"PEUNC/classes/RouteurHttp.php";

class ReponseClient
/*
 * Réponse à servir au client en fonction de la route trouvée suite à la requête http.
*/
{
	private $T_param = [];	// tableau des paramètres
	private $route;

	public function __construct(HttpRouter $route)
	{
		$this->route = $route;

		switch($route->getMethode())	// ne peut répondre qu'aux méthode GET et POST pour le moment
		{
			case "GET":
				$this->ReponseGET();
				break;
			case "PUT":
				$this->ReponsePOST();
				break;
			default:
				$this->ReponseInconnue();
		}
	}

	private function PrepareParametres()
	{
	}

// Réponses aux diférentes méthodes Http prises en compte =========================================================
	private function ReponseGET()
	{
		$BD = new BDD;			// ouvrir une BD qui sera disponible pour la suite du code
		$classePage = $BD->ClassePage($this->route->getAlpha(), $this->route->getBeta(), $this->route->getGamma());
		if (!isset($classePage))	throw new \Exception("La classe de page n&apos;est pas d&eacute;finie dans le squelette.");

		Page::SauvegardeEtat();	// sauvegarde de l'état courant
		// MAJ de l'état
		$_SESSION["PEUNC"]['alpha']	= $this->route->getAlpha();
		$_SESSION["PEUNC"]['beta']	= $this->route->getBeta();
		$_SESSION["PEUNC"]['gamma']	= $this->route->getGamma();

		$PAGE = new $classePage(explode("/", $paramPage));
		$PAGE->ExecuteControleur($_SESSION["PEUNC"]['alpha'], $_SESSION["PEUNC"]['beta'], $_SESSION["PEUNC"]['gamma']);
		include $PAGE->getView(); // insertion de la vue
	}

	private function ReponsePOST()
	{
	}

	private function ReponseInconnue()
	{	// ne sait pas répondre à la méthode demandée (PUT et DELETE par exemple)
	}
}
