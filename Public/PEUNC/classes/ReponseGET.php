<?php
namespace PEUNC;

class ReponseGET extends ReponseClient
{
	public function __construct(HttpRouter $route)
	{	// génère le code html à renvoyer au client
		parent::__construct($route);
		$PAGE = new $this->classePage(
							$route->getAlpha(),
							$route->getBeta(),
							$route->getGamma(),
							"GET",
							$this->PrepareParametres($_GET)
						);
		$PAGE->ExecuteControleur();
		include $PAGE->getView(); // insertion de la vue
	}
}
