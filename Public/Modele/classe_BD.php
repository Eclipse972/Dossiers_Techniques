<?php
class base2donnees extends PEUNC\classes\BDD { // chaque requête doit commencer par une nouvelle connexion. =< utilisation de new à chaque appael

public function Gerer_index($NB_colonne) {
	$code = '';
	$this->resultat = $this->BD->query('SELECT * FROM Vue_code_vignettes');
	$id = 0;
	while ($ligne = $this->resultat->fetch()) {	// récupère et agrège le code
		$No_colonne = $id % $NB_colonne;
		if($No_colonne==0) $code .=  '<tr>'."\n"; // nouvelle ligne
		$code .= "\t".$ligne['code']."\n";
		if($No_colonne==$NB_colonne-1) $code .= '</tr>'."\n";	// fin de ligne si dernière colonne atteinte
		$id++;
	}
	// si en sortie on s'arrete sur une colonne autre que la dernière
	if($No_colonne!=$NB_colonne-1) $code .= "\t</tr>\n"; // on termine la ligne
	return $code;
}
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
// Nomenclature du support courant
public function Nomenclature($matière, $observation) {
	$tableau = null;
	$this->Requete('SELECT * FROM Vue_nomenclature WHERE support_ID= ?', [$_SESSION['support']->Id()], 'Nomenclature');
	while ($ligne = $this->resultat->fetch()) {
		$ligne_nomenclature = "\t".$ligne['repere']."\n\t".$ligne['lien_image']."\n\t".$ligne['designation']."\n";
		if ($matière)		$ligne_nomenclature .= "\t".$ligne['matiere']."\n";
		if ($observation) 	$ligne_nomenclature .= "\t".$ligne['observation']."\n";
		$tableau[] = $ligne_nomenclature;
	}
	$this->Fermer();
	return $tableau;
}

public function Colonne_matiere_vide() {
	$this->Requete('SELECT COUNT(*) AS nb_matiere_non_vide FROM Pieces WHERE matiere_ID > 0 AND support_ID = ?',
					[$_SESSION['support']->Id()], 'Colonne_matiere_vide');
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return ($reponse['nb_matiere_non_vide'] == 0);
}

public function Colonne_observation_vide() {
	$this->Requete('SELECT COUNT(*) AS nb_observation_non_vide FROM Pieces WHERE observation <> \'\' AND support_ID = ?',
					[$_SESSION['support']->Id()], 'Colonne_observation_vide');
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return ($reponse['nb_observation_non_vide'] == 0);
}

}
