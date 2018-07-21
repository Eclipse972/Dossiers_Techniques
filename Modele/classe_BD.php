<?php
class base2donnees {
private $BD;
private $resultat;

public function __construct() { // constructeur
	try
	{	// On se connecte à MySQL
		include 'connexion.php'; // script non suivi par git
	//	$this->BD = new PDO('mysql:host=hote;dbname=base;charset=utf8', 'identifiant', 'mot2passe'); 
	}
	catch (Exception $e)
	{	// En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}
}

public function Fermer() { $this->resultat->closeCursor(); }	 // Termine le traitement de la requête

public function ListeDvignettes() { // seule fonction à utiliser une requête sans paramètre
	$tableau = null;
	$this->resultat = $this->BD->query('SELECT ID, nom, pti_nom, dossier FROM Supports ORDER BY pti_nom ASC');
	while ($ligne = $this->resultat->fetch()) {
		$image  ='<img src="'.Image($ligne['pti_nom'],'Supports/'.$ligne['dossier'].'/images/').'" alt = "'.$ligne['nom'].'">';
		$tableau[] = Lien($ligne['nom'].'<br>'.$image, $ligne['ID']);
	}
	$this->Fermer();
	return $tableau;
}
/*	**********************************************************************
	Toutes les fonctions qui suivent font appel à des requêtes paramétrées
	**********************************************************************
*/
public function Requete($requete, array $T_parametre) { // utilisation des paramètres à venir
	$this->resultat = $this->BD->prepare($requete);
	// la liste de paramètres sous forme d'un tableau dans le même ordre que les ? dans la requête
	$this->resultat->execute($T_parametre);
}

public function Support($id) {
	$T_du = array ('du ', 'de la ', 'de l&apos;');
	$T_le = array ('le ', 'la ',	'l&apos;');
	$ligne = null;
	$this->Requete('SELECT nom, pti_nom, dossier, article_ID FROM Supports WHERE Supports.ID= ?', [$id]);
	$ligne = $this->resultat->fetch();
	if ($ligne != null) { // la ligne est non vide
		$support[ID]		= $id;
		$support[PTI_NOM]	= $ligne['pti_nom'];
		$support[DOSSIER]	= 'Supports/'.$ligne['dossier'].'/';
		$support[IMAGE]		= '<img src="'.$support[DOSSIER].'images/'.$support[PTI_NOM].'.png" alt="'.$T_le[$ligne['article_ID']-1].$ligne['nom'].'">';
		$support[TITRE]		= 'Dossier technique '.$T_du[$ligne['article_ID']-1].$ligne['nom'];
	} else $support = null;
	$this->Fermer();
	return $support;
}

public function Nomenclature($support_ID) {
$tableau = null;
	$this->Requete('SELECT repere, quantite, Pieces.nom AS nom, formule AS matiere, URL_wiki, observation, fichier, assemblage, dossier
					FROM Supports, Pieces, Materiaux
					WHERE Pieces.matiere_ID=Materiaux.ID AND Supports.ID=Pieces.support_ID AND support_ID= ?
					ORDER BY repere ASC', [$support_ID]);
	while ($ligne = $this->resultat->fetch()) {
		$ligne['extension'] = ($ligne['assemblage']>0) ? '.EASM' : '.EPRT'; // la valeur numérique pour l'extension est remplacée par la version texte
		$tableau[] = new Piece($ligne);
	}
	$this->Fermer();
	return $tableau;
}
// Gestion du menu
public function Page_existe($support, $item, $sous_item) {
	$this->resultat = null;
	$this->Requete('SELECT * FROM Items_menu WHERE support_ID= ? AND item= ? AND sous_item= ?', [$support, $item, $sous_item]);
	$this->Fermer();
	return ($this->resultat != null);
}
public function Script($support, $item, $sous_item) { // nom du script à exécuter
	$this->Requete('SELECT script, param1, param2, param3, param4 FROM Items_menu WHERE support_ID= ? AND item= ? AND sous_item= ?',
					[$support, $item, $sous_item]);
	$T_reponse = $this->resultat->fetch(); // la réponse est un tableau
	$this->Fermer();
	return $T_reponse;
}
public function Liste_item($support, $item) {	
	$this->Requete('SELECT texte FROM Items_menu WHERE support_ID= ? AND sous_item=0', [$support]);
	$i=1;
	$tableau = null;
	while ($ligne = $this->resultat->fetch()) {
		$tableau[$i] = ($i != $item) ? Lien($ligne['texte'], $support, $i) : Lien_item_selectionne($ligne['texte'], $support, $i);
		$i++;
	}
	$this->Fermer();
	return $tableau;
}
public function Liste_sous_item($support,$item,$sous_item) {
	$this->Requete('SELECT texte FROM Items_menu WHERE support_ID= ? AND item= ? AND sous_item>0', [$support, $item]);
	$i=1;
	$tableau = null;
	while ($ligne = $this->resultat->fetch()) {
		$tableau[$i] = ($i != $sous_item) ? Lien($ligne['texte'], $support, $item, $i) : $ligne['texte'];
		//	si sous_item est le sélectonné alors lien 									sinon texte seul
		$i++;
	}
	$this->Fermer();
	return $tableau;
}
}
