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

public function Liste_niveau($alpha = null, $beta = null) {
	if(!isset($alpha))	{	// pour les onglets
		$table = "Vue_liste_niveau1";
		$where = "1";
		$param = [];
	} elseif(!isset($beta))	{	// pour le menu
		$table = "Vue_liste_niveau2";
		$where = "alpha = ?";
		$param = [$alpha];
	} else {	// pour le sous-menu
		$table = "Vue_liste_niveau3";
		$where = "alpha = ? AND beta = ?";
		$param = [$alpha, $beta];
	}
	$sql = "SELECT i, URL, image, texte FROM {$table} WHERE {$where}";
	$this->resultat = $this->BD->prepare($sql);
	$this->resultat->execute($param);
	$tableau = null;
	while ($ligne = $this->resultat->fetch()) {
		$i = $ligne['i'];
		$tableau[$i] = '<a href="' . $ligne['URL'] . '">';
		$tableau[$i] .= ($ligne['image'] == '') ? '' : \PEUNC\Page::BaliseImage($ligne['image'], $ligne['texte']);
		$tableau[$i] .= $ligne['texte'] . '</a>';
	}
	$this->resultat->closeCursor();
	return $tableau;
}

public function PagesConnexes($alpha, $beta, $gamma)
{
	return $this->ResultatSQL('SELECT URL FROM Vue_pagesConnexes WHERE alpha= ? AND beta= ? AND gamma= ?', [$alpha, $beta, $gamma]);;
}

}
