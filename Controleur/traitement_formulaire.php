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
if (!empty($_POST))
	foreach ($_POST as $clé => $valeur) { // on formate tous les données du tableau $_POST
		if (isset($T_autorisé[$clé])) // clé autorisée ?
			$T_réponse[$clé] = strip_tags($valeur); // on nettoie la valeur
		// else // paramètre non autorisé => tentative de détournement du formulaire
			// dans le futur: stockage des infos sur le visiteur
	}

if (strlen($T_réponse['nom']) > 0)
	$_SESSION['nom'] = $T_réponse['nom']; // mémorisation du nom

if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $T_réponse['courriel']))
	$_SESSION['courriel'] = $T_réponse['courriel']; // mémorisation du courriel

return [$T_réponse['objet'], $T_réponse['message']]; // en cas de manque, on récupère les réponses déjà fournies pour rempli les champ du formuaire. Dans la variable SESSION?
}

list($objet, $message) = Récupérer_paramètres();

if ((!isset($_SESSION['nom'])) || (!isset($_SESSION['courriel'])) || (strlen($objet) == 0) || (strlen($message) == 0))
	$parametre = "index.php?f=1";
else $parametre = Parametres_support_courant();

header("Location: http://dossiers.techniques.free.fr/".$parametre);
exit;
