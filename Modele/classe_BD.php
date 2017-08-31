<?php
class base2donnees {
var $serveur;
var $identifiant;
var $mot2passe;
var $base;
var $connexion;
var $base_selectionnee;
var $resultat;

function base2donnees() { // constructeur
	include 'connexion.php';
	$this->connexion = mysql_connect($this->serveur, $this->identifiant, $this->mot2passe); // ouverture de la base
	$this->base_selectionnee = mysql_select_db($this->base, $this->connexion); // connexion à la base
}
function Fermer() {
	mysql_free_result($this->resultat); // Libère le résultat de la requête de la mémoire
	mysql_close($this->connexion); // fermeture de la base de données
}
function Requete($requete) {
	$this->resultat = mysql_query($requete);
}
function Support($id) {
	$this->Requete('SELECT nom, pti_nom, dossier, du, le 
					FROM Supports, Articles 
					WHERE article_ID=Articles.ID AND Supports.ID='.$id);
	if (mysql_num_rows($this->resultat)>0) {
		$ligne = mysql_fetch_assoc($this->resultat);
		return new Support($id, $ligne['nom'], $ligne['pti_nom'], $ligne['dossier'], $ligne['du'], $ligne['le']);
	} else return null;
}
function ListeDvignettes() {
	$tableau = null;
	$this->Requete('SELECT ID, nom, pti_nom, dossier 
					FROM Supports 
					ORDER BY nom ASC');
	while ($ligne = mysql_fetch_assoc($this->resultat)) {
		$lien = '<a href="index.php?support='.$ligne['ID'].'">';
		$image  ='<img src="'.Image($ligne['pti_nom'],'Supports/'.$ligne['dossier'].'/').'" alt = "'.$ligne['nom'].'">';
		$tableau[] = $lien.$ligne['nom'].'<br>'.$image.'</a>';
	}
	return $tableau;
}
function Nomenclature($support_ID) {
	$tableau = null;
	$this->Requete('SELECT repere, quantite, Pieces.nom AS nom, formule AS matiere, URL_wiki, observation, fichier, assemblage, dossier
					FROM Supports, Pieces, Materiaux
					WHERE Pieces.matiere_ID=Materiaux.ID AND Supports.ID=Pieces.support_ID AND support_ID='.$support_ID.' 
					ORDER BY repere ASC');
	while ($ligne = mysql_fetch_assoc($this->resultat)) {
		$ligne['extension'] = ($ligne['extension']>0) ? '.EASM' : '.EPRT'; // la valeur numérique pour l'extension est remplacée par la version texte
		$tableau[] = new Piece($ligne);
	}
	return $tableau;
}
// Gestion du menu
function Page_existe($support, $item, $sous_item) {
	$this->Requete('SELECT * 
					FROM Items_menu 
					WHERE support_ID='.$support.' AND item='.$item.' AND sous_item=' .$sous_item);
	return (mysql_num_rows($this->resultat)>0);
}
function Script($support, $item, $sous_item) { // nom du script à exécuter
	$this->Requete('SELECT script 
					FROM Items_menu 
					WHERE support_ID='.$support.' AND item='.$item.' AND sous_item=' .$sous_item);
	$reponse = mysql_fetch_assoc($this->resultat);
	return ($reponse['script']);
}
function Liste_item($support) {
	$tableau = null;
	$i=1;
	$this->Requete('SELECT texte
					FROM Items_menu
					WHERE support_ID='.$support.' AND sous_item=0');
	while ($ligne = mysql_fetch_assoc($this->resultat)) {
		$tableau[$i] = '<a href="index.php?support='.$support.'&item='.$i.'">'.$ligne['texte'].'</a>';	// le lien
		$i++; 
	}
	return $tableau;
}
function Liste_sous_item($support, $item) {
	$tableau = null;
	$i=1;
	$this->Requete('SELECT texte 
					FROM Items_menu 
					WHERE support_ID='.$support.' AND item='.$item.' AND sous_item>0');
	while ($ligne = mysql_fetch_assoc($this->resultat)) {
		$tableau[$i] = '<a href="index.php?support='.$support.'&item='.$item.'&sous_item='.$i.'">'.$ligne['texte'].'</a>';	// le lien
		$i++;
	}
	return $tableau;
}
}
?>
