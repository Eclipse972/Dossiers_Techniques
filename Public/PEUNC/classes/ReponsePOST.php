<?php
namespace PEUNC;

class ReponsePOST extends ReponseClient
{
	private $TlisteReponses;	// réponses utilisateur

	public function __construct(HttpRouter $route)
	{
		parent::__construct($route);
		$this->Pretraitement();

		// traitement du formulaire
		$formulaire = new $classePage(
								$route->getAlpha(),
								$route->getBeta(),
								$route->getGamma(),
								"POST",
								$this->TlisteReponses
							);
		if ($formulaire->FormulaireOK())
		{
			$formulaire->Traitement();
			$URL = $formulaire->URLprecedente();
		}
		else
		{
			$formulaire->TraitementAvantRepresentation();
			$URL = BDD::SELECT("URL FROM Vue_Routes WHERE niveau1 = ? AND niveau2 = ? AND niveau3 = ? AND methodeHttp = ?", [$formulaire->getAlpha(), $formulaire->getBeta(), $formulaire->getGamma(), "GET"]);
		}
		header("Location:" . $URL); // redirection
	}

	public function Pretraitement()	// pré-traitement commun à tous les formulaires
	{
		$this->TlisteReponses = $this->PrepareParametres($_POST);

		if (isset($this->TlisteReponses["XSRF"]))
		{
			$jetonChiffré = $this->TlisteReponses["XSRF"];
			require"config_chiffrement.php";	// défini $cipher, $key et $iv
			$jetonJSON = openssl_decrypt($jetonChiffré, $cipher, $key, $options=0, $iv);
			$O_jeton = json_decode($fichier);
			if (!isset($O_jeton))
				throw new \Exception("Jeton XSRF corrompu");
			elseif (time() - $O_jeton->depart < 5)
				throw new \Exception("temps de r&eacute;ponse inhumain");
		}
		else throw new \Exception("Jeton XSRF absent");
	}
}
