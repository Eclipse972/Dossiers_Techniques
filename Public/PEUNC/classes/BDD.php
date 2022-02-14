<?php
// BDD de PEUNC
namespace PEUNC;

class BDD {
protected $resultat;
protected $BD; // PDO initialisé dans connexion.php

public function __construct() {
	require"connexion.php";
	$this->BD = new \PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $user , $pwd);
	// éventuelle erreur gérée par index.php
}

public function ResultatSQL($requete, array $T_parametre)
/* Renvoie le réultat d'une requête SQL. Cette méthode permet d'exécuter une requête crée en dehors de la classe BDD
 * le résultat est un tableau
 * */
{
	$this->resultat = $this->BD->prepare($requete);
	$this->resultat->execute($T_parametre);
	$reponse = $this->resultat->fetchAll(\PDO::FETCH_ASSOC); // \PDO pour sortir du namespace PEUNC
	$this->resultat->closeCursor();
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

public function Liste_niveau($alpha = null, $beta = null)
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
	$Treponse = $this->ResultatSQL("SELECT {$indice} AS i, code FROM Vue_code_item
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

public function PagesConnexes($alpha, $beta, $gamma)
{
	return $this->ResultatSQL('SELECT URL FROM Vue_pagesConnexes WHERE alpha= ? AND beta= ? AND gamma= ?', [$alpha, $beta, $gamma]);;
}

}
