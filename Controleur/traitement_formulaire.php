<?php
session_start();
// ce script est exécuté independament de index.php donc il faut inclure les classes utiles
include "liens.php";
include "../Modele/classe_support.php";

function Récupérer_paramètres() { // reccueillir les données brutes et les filtrer
$T_autorisé = [ 'nom' => 0,
				'courriel' => 0,
				'objet' => 0,
				'message' => 0];
$T_réponse = null;
$erreur = false;

// on formate tous les données du tableau $_POST
foreach ($_POST as $clé => $valeur) {
	if (isset($T_autorisé[$clé])) // clé autorisée ?
		$T_réponse[$clé] = strip_tags($valeur); // on nettoie la valeur
	else // paramètre non autorisé => tentative de détournement du formulaire
		$erreur = true; // dans le futur: stockage des infos sur le visiteur
}
if (isset($T_réponse['nom']))
	$_SESSION['nom'] = $T_réponse['nom']; // mémorisation du nom
	
if (isset($T_réponse['courriel']))
	$_SESSION['courriel'] = $T_réponse['courriel']; // mémorisation du courriel

return [$T_réponse['objet'], $T_réponse['message']]; // en cas de manque, on récupère les réponses déjà fournies pour rempli les champ du formuaire. Dans la variable SESSION?
}

list($objet, $message) = Récupérer_paramètres();

if (isset($_SESSION['support']))
	$parametre = "?p=".Creer_parametre($_SESSION['support']->ID(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item());
else $parametre = '';

header("Location: http://dossiers.techniques.free.fr/index.php");
exit;
