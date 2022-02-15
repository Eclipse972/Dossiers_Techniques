<?php	// essai d'instance unique de classe de BDD'
require"PEUNC/BacAsable/commun.php";

class BDD
/* Cette classe est statique. Elle permet d'avoir partout la même instance de la BDD sans passer par une variable globale
 * ma source d'inspiration: https://www.training-dev.fr/Cours/Creer-un-framework-MVC-en-Php/Acceder-a-une-base-de-donnees
 * */
{
	private $BD;
	private static $instance;

	private function __construct()
	{
		require"connexion.php";
		$this->BD = new \PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $user , $pwd);
	}

	public static function getInstance()
	{
		if(empty(self::$instance))
		{
			self::$instance = new BDD();
		}
		return self::$instance->BD;
	}

	public static function SELECT($requete, array $T_parametre)
	/* Renvoie le réultat d'une requête SQL SELECT.
	 * la requete est un chaine de caractère sans le mot SELECT de début
	 *
	 * le résultat peut être
	 * un tableau en 2 dimensions
	 * un tableau en ligne
	 * une seule valeur
	 * */
	{
		$pdo = self::getInstance();

		$requete = $pdo->prepare("SELECT " . $requete);
		$requete->execute($T_parametre);
		$reponse = $requete->fetchAll(\PDO::FETCH_ASSOC);
		$requete->closeCursor();
		switch(count($reponse))
		{
			case 0:	// aucun résultat
				$résultat = null;
				break;
			case 1:	// une seule ligne						une seule colonne					plusieurs colonnes
				$résultat = (count($reponse[0]) == 1) ? $résultat = array_shift($reponse[0]) : $reponse[0];
				break;
			default: // plusieurs lignes
				$résultat = $reponse;
		}
		return $résultat;
	}

	public static function Liste_niveau($alpha = null, $beta = null)
	{
		if(!isset($alpha))
		{	// pour les onglets
			$eqAlpha= ">=0";
			$eqBeta	= "=0";
			$eqGamma= "=0";
			$indice	= "alpha";
			$param	= [];
		}
		elseif(!isset($beta))
		{	// pour le menu
			$eqAlpha= "=?";
			$eqBeta = ">0";
			$eqGamma= "=0";
			$indice = "beta";
			$param	= [$alpha];
		}
		else
		{	// pour le sous-menu
			$eqAlpha= "=?";
			$eqBeta = "=?";
			$eqGamma= ">0";
			$indice = "gamma";
			$param	= [$alpha, $beta];
		}
		$Treponse = self::SELECT("{$indice} AS i, code FROM Vue_code_item
							WHERE alpha{$eqAlpha} AND beta{$eqBeta} AND gamma{$eqGamma}
							ORDER BY alpha, beta, gamma",
							$param
						);
		$Tableau = null;
		if (isset($Treponse))
		{
			foreach($Treponse as $ligne)
				$Tableau[(int)$ligne["i"]] = $ligne["code"];
		}
		return $Tableau;
	}

	public static function PagesConnexes($alpha, $beta, $gamma)
	{
		return self::SELECT("URL FROM Vue_pagesConnexes WHERE alpha=? AND beta=? AND gamma=?", [$alpha, $beta, $gamma]);
	}

}

$Tessai = BDD::Liste_niveau(3,2);

$code = "<ul>\n";
foreach($Tessai as $ligne)
{
	$code .= "\t<li>{$ligne}</li>\n";
}
$code .= "</ul>\n";

$this->setSection("<h1>Instance de BDD unique</h1>\n" . $code);
