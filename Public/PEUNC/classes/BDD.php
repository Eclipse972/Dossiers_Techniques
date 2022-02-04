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

public function Requete($requete, array $T_parametre) {
/* permet d'exécuter une requête paramétrée
 * Ex: $this->Requete('SELECT classePage FROM Squelette WHERE alpha= ? AND beta= ? AND gamma= ?', [$alpha, $beta, $gamma]);
 * la liste de paramètres sous forme d'un tableau dans le même ordre que les ? dans la requête
 * si la requêtte n'a pas de paramètre mettre [] commparamètre
 * */
	$this->resultat = $this->BD->prepare($requete);
	$this->resultat->execute($T_parametre);
}

public function Fermer() {
/* Termine le traitement de la requête
 * Utilisation:
 * $this->Requete('SELECT ...', [tableau des paramètres]);
 * traitement du résultat de requête
 * $this->Fermer(); pour la fermeture de la BD
 * */
	$this->resultat->closeCursor();
}

public function ResultatSQL($requete, array $T_parametre) {
/* Renvoie le réultat d'une requête SQL. Cette méthode permet d'exécuter une requête crée en dehors de la classe BDD
 * le résultat est un tableau
 * */
 	$this->Requete($requete, $T_parametre);
	$reponse = $this->resultat->fetchAll(\PDO::FETCH_ASSOC); // \PDO pour sortir du namespace PEUNC
	$this->Fermer();
	switch(count($reponse)) {
		case 0:	// aucun résultat
			$résultat = null;
			break;
		case 1:	// une seule ligne
			$résultat = $reponse[0];
			// dans le futur: traiter le cas où il n'y aura qu'une seule colonne
			break;
		default: // plusieurs lignes
			$résultat = $reponse;
	}
	return $résultat;
// réécrire la fonction PagesConnexes
}

public function ClassePage($alpha, $beta, $gamma) {
/* Recherche le nom de ma classe de page à charger suivant la position $alpha, $beta, $gamma
 * */
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
		$tableau[$i] .= ($ligne['image'] == '') ? '' : \PEUNC\Page::BaliseImage($ligne['image'], $ligne['texte']);
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
