<?php
namespace PEUNC;

class ReponseClient
// Réponse à servir au client en fonction de la route trouvée suite à la requête http.
// Classe nécesaire: HttpRouter chargée par l'autoloader'
{
	protected $route;
	protected $classePage;

	public function __construct(HttpRouter $route)
	{
		$this->route = $route;
		$classePage = BDD::SELECT("classePage FROM Squelette WHERE alpha= ? AND beta= ? AND gamma= ? AND methode = ?",
								[$route->getAlpha(), $route->getBeta(), $route->getGamma(), $route->getMethode()]);
		if (isset($classePage))
			$this->classePage = $classePage;
		else throw new \Exception("La classe de page n&apos;est pas d&eacute;finie dans le squelette.");
	}

	public function PrepareParametres($Tableau)
	/* Dans la table Squelette on récupère la liste des paramètres autorisés.
	 * On construit un nouveau tableau qui ne contient que les clés autorisées et chaque valeur subit un nettoyage.
	 *
	 * Retour: un tableau débarasssé des clés non autorisées avec ses valeurs nettoyées.
	 * */
	{
		// récupère la liste des paramètres autorisés
		$reponseBD = BDD::SELECT("paramAutorise FROM Vue_Routes WHERE ID = ?", [$this->route->getID()]);

		$TparamAutorises = json_decode($reponseBD, true);

		$Treponse = [];
		foreach ($TparamAutorises as $clé)
			if (isset($Tableau[$clé]))							// seules les clés autorisées sont prises en compte
				$Treponse[$clé] = strip_tags($Tableau[$clé]);	// puis ces valeurs sont nettoyées
		return $Treponse;
	}
}
