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
	$this->Requete('SELECT nom, pti_nom, dossier, du, le FROM Supports, Articles WHERE article_ID=Articles.ID AND Supports.ID='.$id);
	if (mysql_num_rows($this->resultat)>0) {
		$ligne = mysql_fetch_assoc($this->resultat);
		return new Support($ligne['nom'], $ligne['pti_nom'], $ligne['dossier'], $ligne['du'], $ligne['le']);
	} else return null;
}
function ListeDvignettes() {
	$tableau = null;
	$this->Requete('SELECT ID, nom, pti_nom, dossier FROM Supports ORDER BY nom ASC');
	while ($ligne = mysql_fetch_assoc($this->resultat)) {
		$tableau[] = array ('ID' => $ligne['ID'],
							'vignette' => $ligne['nom'].'<br><img src="'.Image($ligne['pti_nom'],'Supports/'.$ligne['dossier'].'/').'" alt = "'.$ligne['nom'].'">');
	}
	return $tableau;
}
}
?>
