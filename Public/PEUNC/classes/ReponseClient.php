<?php
namespace PEUNC;

class ReponseClient
// Réponse à servir au client en fonction de la route trouvée suite à la requête http.
// Classe nécesaire: HttpRouter chargée par l'autoloader'
{
	private $T_param;	// tableau des paramètres
	private $route;

	public function __construct(HttpRouter $route)
	{
		global $BD;	// définie dans index.php
		$this->route = $route;
		$classePage = $BD->ClassePage($this->route->getAlpha(), $this->route->getBeta(), $this->route->getGamma());
		if (!isset($classePage))	throw new \Exception("La classe de page n&apos;est pas d&eacute;finie dans le squelette.");

		switch($route->getMethode())	// ne peut répondre qu'aux méthode GET et POST pour le moment
		{
			case "GET":
				$this->ReponseGET();
				break;
			case "POST":
				$this->ReponsePOST();
				break;
			default:
				$this->ReponseInconnue();
		}
	}

	private function PrepareParametres($Tableau)
	{
		global $BD;	// définie dans index.php
		// récupère la liste des paramètres autorisés
		$reponseBD = $BD->ResultatSQL("SELECT paramAutorise FROM Vue_Routes WHERE ID = ?", [$this->route->getID()]);

		$TparamAutorises = json_decode($reponseBD, true);

		$this->T_param = [];
		foreach ($TparamAutorises as $clé)
			if (isset($Tableau[$clé]))
				$this->T_param[$clé] = strip_tags($Tableau[$clé]);	// seules les clés autorisées sont prises en compte puis nettoyées
	}

// Réponses aux diférentes méthodes Http =========================================================

	private function ReponseGET()
	{
		Page::SauvegardeEtat($this->route->getAlpha(), $this->route->getBeta(), $this->route->getGamma());	// sauvegarde de l'état courant
		$this->PrepareParametres($_GET);
		$PAGE = new $classePage($this->route->getAlpha(), $this->route->getBeta(), $this->route->getGamma(), "GET", $this->T_param);
		$PAGE->ExecuteControleur();
		include $PAGE->getView(); // insertion de la vue
	}

	private function ReponsePOST()
	{	// pas de sauvegarde de la position car on ne doit rien afficher

		$this->PrepareParametres($_POST);
		$PAGE = new $classePage($this->route->getAlpha(), $this->route->getBeta(), $this->route->getGamma(), "POST", $this->T_param);
		$PAGE->ExecuteControleur();

		// redirection vers la page précédente
	}

	private function ReponseInconnue()
	{	// ne sait pas répondre à la méthode demandée (PUT et DELETE par exemple)
	}
}
