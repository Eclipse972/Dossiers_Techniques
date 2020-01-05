<?php
class base2donnees { // chaque requête doit commencer par une nouvelle connexion. =< utilisation de new à chaque appael
private $resultat;
private $BD; // PDO initialisé dans connexion.php

public function __construct() {
	try	{
		include 'connexion.php'; // On se connecte à MySQL grâce au script non suivi par git
	}
	catch (Exception $e) { // En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}
}

private function Requete($requete, array $T_parametre, $fonction) {
	$this->resultat = $this->BD->prepare($requete);
	// la liste de paramètres sous forme d'un tableau dans le même ordre que les ? dans la requête
	$this->resultat->execute($T_parametre);
	if ($this->resultat->errorCode() != '00000')
		trigger_error('Erreur de requête dans la fonction '.$fonction, E_USER_ERROR);
}

private function Fermer() { $this->resultat->closeCursor(); }	 // Termine le traitement de la requête

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
// Gestion du menu
public function Page_existe($support, $item, $sous_item) {
	$this->Requete('SELECT COUNT(*) AS nb_page FROM Menu WHERE support_ID= ? AND item= ? AND sous_item= ?',
					[$support, $item, $sous_item], 'Page_existe');
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return ($reponse['nb_page'] == 1);
}
// construction de la page pour le support courant
public function Type_page() { // type de page associé à l'item sélectioné dans le menu
	$this->Requete('SELECT type_page FROM Menu WHERE support_ID= ? AND item= ? AND sous_item= ?',
					[$_SESSION['support']->Id(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item()], 'Type_page');
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return $reponse['type_page'];
}
public function Hydratation() {
	$this->Requete('SELECT variable, valeur FROM Vue_Hydrate_Page WHERE support_ID= ? AND item= ? AND sous_item= ?',
					[$_SESSION['support']->Id(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item()], 'Hydratation');
	$tableau = [];
	while ($ligne = $this->resultat->fetch())
		$tableau += [$ligne['variable'] => $ligne['valeur']];
	$this->Fermer();	
	return $tableau;
}

public function Liste_item() { return $this->Liste_pour_menu(true); } // liste des items du support courant

public function Liste_sous_item() { return $this->Liste_pour_menu(false); } // liste des sous-items du support courant

private function Liste_pour_menu($pour_item = true){ // factorisation des fonction Liste_item et Liste_sous_item
	$support = $_SESSION['support']->ID();
	if ($pour_item) {
		$requette = 'SELECT code FROM Vue_code_menu WHERE support_ID= ? AND sous_item=0';
		$paramètres = [$support];
		$étiquette = 'item_selectionne';
		$sélection = $_SESSION['support']->Item();
	} else {
		$item = $_SESSION['support']->Item();
		$requette = 'SELECT code FROM Vue_code_menu WHERE support_ID= ? AND item= ? AND sous_item>0';
		$paramètres = [$support,$item];
		$étiquette = 'sous_item_selectionne';
		$sélection = $_SESSION['support']->Sous_item();
	}
	$this->Requete($requette, $paramètres, 'Liste_pour_menu');
	$i=1;
	$tableau = null;
	while ($ligne = $this->resultat->fetch()) {
		$tableau[$i] = $ligne['code'];
		$i++;
	}
	$this->Fermer();
	// modification de l'item/sous-item sélectionné s'il existe
	if (isset($tableau[$sélection]))
		$tableau[$sélection] = '<li><a id="'.$étiquette.'"'.substr($tableau[$sélection], 6); // <a href= ... est remplacé par <a id="étiquette" href=...
	return $tableau;
}

public function Texte_item() { // renvoie le texte de l'item/sous-item courant du support
	$this->Requete('SELECT texte FROM Menu WHERE support_ID= ? AND item= ? AND sous_item= ?',
					[$_SESSION['support']->ID(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item()], 'Texte_item');
	$réponse = $this->resultat->fetch();
	$this->Fermer();
	return $réponse['texte'];
}
}
