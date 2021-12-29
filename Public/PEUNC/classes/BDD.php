<?php
// BDD de PEUNC
namespace PEUNC\classes;

class BDD {
protected $resultat;
protected $BD; // PDO initialisé dans connexion.php

public function __construct() {
	require"connexion.php";
	$this->BD = new \PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $user , $pwd);
	// éventuelle erreur gérée par index.php
}

protected function Requete($requete, array $T_parametre) {
	$this->resultat = $this->BD->prepare($requete);
	// la liste de paramètres sous forme d'un tableau dans le même ordre que les ? dans la requête
	$this->resultat->execute($T_parametre);
}

protected function Fermer() { $this->resultat->closeCursor(); }	 // Termine le traitement de la requête

public function ClassePage($alpha, $beta, $gamma) {
	$this->Requete('SELECT classePage FROM Squelette WHERE alpha= ? AND beta= ? AND gamma= ?', [$alpha, $beta, $gamma]);
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return $reponse[0];
}

public function Controleur($alpha, $beta, $gamma) {
	$this->Requete('SELECT controleur FROM Squelette WHERE alpha= ? AND beta= ? AND gamma= ?', [$alpha, $beta, $gamma]);
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return $reponse[0];
}

public function CherchePosition($URL) {
	$this->Requete('SELECT niveau1, niveau2, niveau3 FROM Vue_URLvalides WHERE URL = ?', [$URL]);
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return array($reponse['niveau1'], $reponse['niveau2'], $reponse['niveau3']);
}

public function TexteErreur($code) {
	$this->Requete('SELECT texteMenu FROM Squelette WHERE alpha=-1 AND beta= ?', [$code]);
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return $reponse['texteMenu'];
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
	$this->Requete($sql, $param);
	$tableau = null;
	while ($ligne = $this->resultat->fetch()) {
		$i = $ligne['i'];
		$tableau[$i] = '<a href="' . $ligne['URL'] . '">';
		$tableau[$i] .= ($ligne['image'] == '') ? '' : \PEUNC\classes\Page::BaliseImage($ligne['image'], $ligne['texte']);
		$tableau[$i] .= $ligne['texte'] . '</a>';
	}
	$this->Fermer();
	return $tableau;
}

public function PagesConnexes($alpha, $beta, $gamma) {
	$this->Requete('SELECT URL FROM Vue_pagesConnexes WHERE alpha= ? AND beta= ? AND gamma= ?', [$alpha, $beta, $gamma]);
	$reponse = $this->resultat->fetchAll();
	$this->Fermer();
	return $reponse;
}

}
