<?php
class base2donnees extends PEUNC\classes\BDD { // chaque requête doit commencer par une nouvelle connexion. =< utilisation de new à chaque appael

/*	**********************************************************************
	Toutes les fonctions qui suivent font appel à des requêtes paramétrées
	**********************************************************************
*/
public function Support($id) {
	$this->Requete('SELECT * FROM Vue_hydrate_supports WHERE ID= ?', [$id], 'Support');
	$T_support = $this->resultat->fetch();
	$this->Fermer();
	return $T_support;
}

public function Support_existe($id) {
	$this->Requete('SELECT COUNT(*) AS nb_support FROM Supports WHERE ID= ?', [$id], 'Support_existe');
	$T_reponse = $this->resultat->fetch(); // la réponse est un tableau
	$this->Fermer();
	return ($T_reponse['nb_support'] == 1);
}

// fonction pour la page a propos
public function Description_maquette()	{ return $this->A_propos(true); }

public function Lien_support()			{ return $this->A_propos(false); }

private function A_propos($en_texte = true) { // factorisation de Description_maquette et Lien_support
	if ($en_texte) {
		$requete = 'SELECT texte FROM Commentaires WHERE support_ID= ? AND lien = "" ORDER BY ordre ASC';
		$index = 'texte';
	} else {
		$requete = 'SELECT lien FROM Vue_lien_support WHERE support_ID= ?';
		$index = 'lien';
	}
	$this->Requete($requete, [$_SESSION['support']->Id()], 'A_propos');
	$tableau = null;
	while ($ligne = $this->resultat->fetch())	$tableau[] = $ligne[$index];
	$this->Fermer();
	return $tableau;
}

}
