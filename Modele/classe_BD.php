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
function Fermer() { // il est inutile de fermer la BD en dehors des scripts de ce fichier
	mysql_free_result($this->resultat); // Libère le résultat de la requête de la mémoire
	mysql_close($this->connexion); // fermeture de la base de données
}
function Requete($requete) {
	$this->resultat = mysql_query($requete);
}
function Support($id) {
	$T_du = array ('du ', 'de la ', 'de l&apos;');
	$T_le = array ('le ', 'la ',	'l&apos;');
	
	$this->Requete('SELECT nom, pti_nom, dossier, article_ID 
					FROM Supports
					WHERE Supports.ID='.$id);
	if (mysql_num_rows($this->resultat)>0) {
		$ligne = mysql_fetch_assoc($this->resultat);
		$support[ID]		= $id;
		$support[PTI_NOM]	= $ligne['pti_nom'];
		$support[DOSSIER]	= 'Supports/'.$ligne['dossier'].'/';
		$support[IMAGE]		= '<img src="'.$support[DOSSIER].'images/'.$support[PTI_NOM].'.png" alt="'.$T_le[$ligne['article_ID']-1].$ligne['nom'].'">';
		$support[TITRE]		= 'Dossier technique '.$T_du[$ligne['article_ID']-1].$ligne['nom'];
	} else $support = null;
	$this->Fermer();
	return $support;
}
function ListeDvignettes() {
	$tableau = null;
	$this->Requete('SELECT ID, nom, pti_nom, dossier 
					FROM Supports 
					ORDER BY pti_nom ASC');
	while ($ligne = mysql_fetch_assoc($this->resultat)) {
		$image  ='<img src="'.Image($ligne['pti_nom'],'Supports/'.$ligne['dossier'].'/images/').'" alt = "'.$ligne['nom'].'">';
		$tableau[] = Lien($ligne['nom'].'<br>'.$image, $ligne['ID']);
	}
	$this->Fermer();
	return $tableau;
}
function Nomenclature($support_ID) {
$tableau = null;
	$this->Requete('SELECT repere, quantite, Pieces.nom AS nom, formule AS matiere, URL_wiki, observation, fichier, assemblage, dossier
					FROM Supports, Pieces, Materiaux
					WHERE Pieces.matiere_ID=Materiaux.ID AND Supports.ID=Pieces.support_ID AND support_ID='.$support_ID.' 
					ORDER BY repere ASC');
	while ($ligne = mysql_fetch_assoc($this->resultat)) {
		$ligne['extension'] = ($ligne['assemblage']>0) ? '.EASM' : '.EPRT'; // la valeur numérique pour l'extension est remplacée par la version texte
		$tableau[] = new Piece($ligne);
	}
	$this->Fermer();
	return $tableau;
}
// Gestion du menu
function Page_existe($support, $item, $sous_item) {
	$this->Requete('SELECT * 
					FROM Items_menu 
					WHERE support_ID='.$support.' AND item='.$item.' AND sous_item=' .$sous_item);
	$test = (mysql_num_rows($this->resultat)>0);
	$this->Fermer();
	return $test;
}
function Script($support, $item, $sous_item) { // nom du script à exécuter
	$this->Requete('SELECT script, param1, param2, param3, param4 
					FROM Items_menu 
					WHERE support_ID='.$support.' AND item='.$item.' AND sous_item=' .$sous_item);
	$T_reponse = mysql_fetch_assoc($this->resultat); // la réponse est un tableau
	$this->Fermer();
	return $T_reponse;
}
function Liste_item($support, $item) {	
	$this->Requete('SELECT texte FROM Items_menu WHERE support_ID='.$support.' AND sous_item=0');
	$i=1;
	$tableau = null;
	while ($ligne = mysql_fetch_assoc($this->resultat)) {
		$tableau[$i] = ($i != $item) ? Lien($ligne['texte'], $support, $i) : Lien_item_selectionne($ligne['texte'], $support, $i);
		$i++;
	}
	$this->Fermer();
	return $tableau;
}
function Liste_sous_item($support,$item,$sous_item) {
	$this->Requete('SELECT texte FROM Items_menu WHERE support_ID='.$support.' AND item='.$item.' AND sous_item>0');
	$i=1;
	$tableau = null;
	while ($ligne = mysql_fetch_assoc($this->resultat)) {
		$tableau[$i] = ($i != $sous_item) ? Lien($ligne['texte'], $support, $item, $i) : $ligne['texte'];
		//	si sous_item est le sélectonné alors lien 									sinon texte seul
		$i++;
	}
	$this->Fermer();
	return $tableau;
}
}
?>
