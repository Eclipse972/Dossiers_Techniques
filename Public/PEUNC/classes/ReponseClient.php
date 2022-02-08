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
		$classePage = $BD->ClassePage($this->route->getAlpha(), $this->route->getBeta(), $this->route->getGamma(), $this->route->getMethode());
		if (!isset($classePage))	throw new \Exception("La classe de page n&apos;est pas d&eacute;finie dans le squelette.");

		switch($route->getMethode())	// ne peut répondre qu'aux méthode GET et POST pour le moment
		{
			case "GET":
				$this->ReponseGET($classePage);
				break;
			case "POST":
				$this->ReponsePOST($classePage);
				break;
			default:
				$this->ReponseInconnue();
		}
	}

	private function PrepareParametres($Tableau)
	/* Dans la table Squelette on récupère la liste des paramètres autorisés.
	 * On construit un nouveau tableau qui ne contient que les clés autorisées et chaque valeur subit un nettoyage.
	 *
	 * Retour: un tableau débarasssé des clés non autorisées avec ses valeurs nettoyées.
	 * */
	{
		global $BD;	// définie dans index.php
		// récupère la liste des paramètres autorisés
		$reponseBD = $BD->ResultatSQL("SELECT paramAutorise FROM Vue_Routes WHERE ID = ?", [$this->route->getID()]);

		$TparamAutorises = json_decode($reponseBD, true);

		$Treponse = [];
		foreach ($TparamAutorises as $clé)
			if (isset($Tableau[$clé]))
				$Treponse[$clé] = strip_tags($Tableau[$clé]);	// seules les clés autorisées sont prises en compte puis nettoyées
		return $Treponse;
	}

// Réponses aux diférentes méthodes Http =========================================================

	private function ReponseGET($classePage)
	{	// génère le code html à renvyer au client
		Page::SauvegardeEtat($this->route->getAlpha(), $this->route->getBeta(), $this->route->getGamma());	// sauvegarde de l'état courant
		$this->T_param = $this->PrepareParametres($_GET);
		$PAGE = new $classePage($this->route->getAlpha(), $this->route->getBeta(), $this->route->getGamma(), "GET", $this->T_param);
		$PAGE->ExecuteControleur();
		include $PAGE->getView(); // insertion de la vue
	}

	private function ReponsePOST($classePage)
	{	// traite le formulaire
		global $BD;	// définie dans index.php
		$this->T_param = $this->PrepareParametres($_POST);
		$formulaire = new $classePage($this->route->getAlpha(), $this->route->getBeta(), $this->route->getGamma(), "POST", $this->T_param);
		if ($formulaire->SpamDétecté())
		{
			$formulaire->TraiterSpam();
			$URL = "/";
		}
		elseif ($formulaire->FormulaireOK())
		{
			$formulaire->Traitement();
			$URL = $formulaire->URLprecedente();
		}
		else
		{
			$formulaire->TraitementAvantRepresentation();
			$URL = $BD->ResultatSQL("SELECT URL FROM Vue_Routes WHERE niveau1 = ? AND niveau2 = ? AND niveau3 = ? AND methodeHttp = ?", [$formulaire->getAlpha(), $formulaire->getBeta(), $formulaire->getGamma(), "GET"]);
		}
		header("Location:" . $URL); // redirection
	}

	private function ReponseInconnue()
	{	// ne sait pas répondre à la méthode demandée (PUT et DELETE par exemple)
		$PAGE = new PageErreur;
		$PAGE->setCodeErreur("application");
		$PAGE->setTitreErreur("M&eacute;thode Http inconnue : " . $this->route->getMethode());
		$PAGE->setCorpsErreur("<p>PEUNC ne sais r&eacute;pondre qu&apos;aux méthodes PUT et GET pour le moment.</p>");
		include $PAGE->getView(); // insertion de la vue
	}
}
