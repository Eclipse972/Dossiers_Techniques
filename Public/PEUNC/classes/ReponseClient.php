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

	private function PrepareParametres($Tableau)
	{
		global $BD;	// définie dans index.php
		// récupère la liste des paramètres autorisés
		$reponseBD = $BD->ResultatSQL("SELECT paramAutorise FROM Vue_Routes WHERE ID = ?", [$this->route->getID()]);
		$TparamAutorises = json_decode($reponseBD, true);

		$this->T_param = [];
		foreach ($TparamAutorises as $clé)
			 $this->T_param[$clé] = htmlspecialchars($Tableau[$clé]);	// seules les clés autorisées sont prises en compte
	}

// Réponses aux diférentes méthodes Http prises en compte =========================================================
	private function ReponseGET()
	{
		global $BD;	// définie dans index.php

		Page::SauvegardeEtat();	// sauvegarde de l'état courant
		// MAJ de l'état
		$_SESSION["PEUNC"]['alpha']	= $this->route->getAlpha();
		$_SESSION["PEUNC"]['beta']	= $this->route->getBeta();
		$_SESSION["PEUNC"]['gamma']	= $this->route->getGamma();

		$classePage = $BD->ClassePage($this->route->getAlpha(), $this->route->getBeta(), $this->route->getGamma());
		if (!isset($classePage))	throw new \Exception("La classe de page n&apos;est pas d&eacute;finie dans le squelette.");

		$PAGE = new $classePage(explode("/", $paramPage));
		$PAGE->ExecuteControleur($this->route->getAlpha(),$this->route->getBeta(), $this->route->getGamma());
		include $PAGE->getView(); // insertion de la vue
	}

	private function ReponsePOST()
	{
	}

	private function ReponseInconnue()
	{	// ne sait pas répondre à la méthode demandée (PUT et DELETE par exemple)
	}
}
