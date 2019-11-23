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

private function Requete($requete, array $T_parametre) {
	$this->resultat = $this->BD->prepare($requete);
	// la liste de paramètres sous forme d'un tableau dans le même ordre que les ? dans la requête
	$this->resultat->execute($T_parametre);
}

private function Fermer() { $this->resultat->closeCursor(); }	 // Termine le traitement de la requête

public function ListeDvignettes() { // seule fonction à utiliser une requête sans paramètre
	$tableau = null;
	$this->resultat = $this->BD->query('SELECT CONCAT(\'<a href="pageDT.php?p=\',CHAR(97+ID), \'">\', nom, 
										\'<br><img src=\"Supports/\',dossier,\'/images/\',pti_nom,\'.png\" alt=\"\',nom,\'\"></a>\') 
										AS code 
										FROM Supports ORDER BY pti_nom ASC, nom ASC');
	while ($ligne = $this->resultat->fetch()) {
		$tableau[] = $ligne['code'];
	}
	$this->Fermer();
	return $tableau;
}
/*	**********************************************************************
	Toutes les fonctions qui suivent font appel à des requêtes paramétrées
	**********************************************************************
*/
public function Support($id) {
	$this->Requete('SELECT nom, pti_nom, dossier, article_ID, zip FROM Supports WHERE ID= ?', [$id]);
	$T_support = $this->resultat->fetch();
	$this->Fermer();
	return $T_support;
}

public function Support_existe($id) {
	$this->Requete('SELECT COUNT(*) AS nb_support FROM Supports WHERE ID= ?', [$id]);
	$T_reponse = $this->resultat->fetch(); // la réponse est un tableau
	$this->Fermer();
	return ($T_reponse['nb_support'] == 1);
}

// fonction pour la page a propos
public function Description_maquette() {
	$tableau = null;
	$this->Requete('SELECT texte FROM Commentaires WHERE support_ID= ? AND lien = "" ORDER BY ordre ASC',
					[$_SESSION['support']->Id()]);
	while ($ligne = $this->resultat->fetch()) {
		$tableau[] = $ligne['texte'];
	}
	$this->Fermer();
	return $tableau;
}

public function Lien_support() {
	$this->Requete('SELECT CONCAT(\'<a href="\', lien, \'" target="_blank">\', texte, \'</a>\') AS code 
					FROM Commentaires WHERE support_ID= ? AND lien <> "" ORDER BY ordre ASC',
					[$_SESSION['support']->ID()]);
	$tableau = null;
	while ($ligne = $this->resultat->fetch())	$tableau[] = $ligne['code'];
	$this->Fermer();
	return $tableau;
}
// Nomenclature du support courant
public function Nomenclature() {
	$tableau = null;
	$this->Requete('SELECT repere, quantite, Pieces.nom AS nom, formule AS matiere, URL_wiki, observation, fichier, assemblage, dossier
					FROM Supports, Pieces, Materiaux
					WHERE Pieces.matiere_ID=Materiaux.ID AND Supports.ID=Pieces.support_ID AND support_ID= ?
					ORDER BY repere ASC', [$_SESSION['support']->Id()]);
	while ($ligne = $this->resultat->fetch()) {
		$ligne['extension'] = ($ligne['assemblage']>0) ? '.EASM' : '.EPRT'; // la valeur numérique pour l'extension est remplacée par la version texte
		$tableau[] = new Piece($ligne);
	}
	$this->Fermer();
	return $tableau;
}

public function Colonne_observation_vide() {
	$this->Requete("SELECT COUNT(*) AS nb_observation FROM Pieces WHERE observation <> '' AND support_ID= ?", [$_SESSION['support']->Id()]);
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return ($reponse['nb_observation'] == 0);
}

public function Colonne_matiere_vide() {
	$this->Requete('SELECT COUNT(*) AS nb_matiere FROM Pieces WHERE matiere_ID > 0 AND support_ID= ?', [$_SESSION['support']->Id()]);
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return ($reponse['nb_matiere'] == 0);
}
// Gestion du menu
public function Page_existe($support, $item, $sous_item) {
	$this->Requete('SELECT COUNT(*) AS nb_page FROM Menu WHERE support_ID= ? AND item= ? AND sous_item= ?', [$support, $item, $sous_item]);
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return ($reponse['nb_page'] == 1);
}
// construction de la page pour le support courant
public function Type_page() { // nom du script à exécuter
	$this->Requete('SELECT type_page FROM Menu WHERE support_ID= ? AND item= ? AND sous_item= ?',
					[$_SESSION['support']->Id(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item()]);
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return $reponse['type_page']; // ne contient pas l'extension car c'est peut-être un mot clé
}
public function Hydratation() {
	$this->Requete('SELECT variable, valeur FROM HydratePage
					WHERE menu_ID=(SELECT ID FROM Menu WHERE support_ID= ? AND item= ? AND sous_item= ?)',
					[$_SESSION['support']->Id(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item()]);
	$tableau = null;
	while ($ligne = $this->resultat->fetch())	$tableau[$ligne['variable']] = $ligne['valeur'];
	$this->Fermer();
	return $tableau;
}

public function Liste_item() { return $this->Liste_pour_menu(true); } // liste des items du support courant

public function Liste_sous_item() { return $this->Liste_pour_menu(false); } // liste des sous-items du support courant

private function Liste_pour_menu($pour_item = true){ // factorisation des fonction Liste_item et Liste_sous_item
	$support = $_SESSION['support']->ID();
	if ($pour_item) {
		$requette = 'SELECT CONCAT(\'<a href="pageDT.php?p=\',CHAR(97+ ?), CHAR(97+ item), \'">\', texte, \'</a>\') AS code FROM Menu WHERE support_ID= ? AND sous_item=0';
		$paramètres = [$support,$support];
		$étiquette = 'item_selectionne';
		$sélection = $_SESSION['support']->Item();
	} else {
		$item = $_SESSION['support']->Item();
		$requette = 'SELECT CONCAT(\'<a href="pageDT.php?p=\',CHAR(97+ ?), CHAR(97+ ?), CHAR(97+ sous_item), \'">\', texte, \'</a>\') AS code FROM Menu WHERE support_ID= ? AND item= ? AND sous_item>0';
		$paramètres = [$support,$item,$support,$item];
		$étiquette = 'sous_item_selectionne';
		$sélection = $_SESSION['support']->Sous_item();
	}
	$this->Requete($requette, $paramètres);
	$i=1;
	$tableau = null;
	while ($ligne = $this->resultat->fetch()) {
		$tableau[$i] = $ligne['code'];
		$i++;
	}
	$this->Fermer();
	// modification de l'item/sous-item sélectionné s'il existe
	if (isset($tableau[$sélection]))
		$tableau[$sélection] = '<a id="'.$étiquette.'"'.substr($tableau[$sélection], 2); // <a href= ... est remplacé par <a id="étiquette" href=...
	return $tableau;
}

public function Texte_item($support,$item,$sous_item) { // renvoie le texte de l'item/sous-item
	$this->Requete('SELECT texte FROM Menu WHERE support_ID= ? AND item= ? AND sous_item= ?',
					[$support, $item, $sous_item]);
	$réponse = $this->resultat->fetch();
	$this->Fermer();
	return $réponse['texte'];
}

}
