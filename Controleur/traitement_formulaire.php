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

$message_erreur = '';
if (strlen($T_réponse['nom']) > 0)
	$_SESSION['nom'] = $T_réponse['nom']; // mémorisation du nom
else $message_erreur .= 'nom obligatoire'."\n";

if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $T_réponse['courriel']))
	$_SESSION['courriel'] = $T_réponse['courriel']; // mémorisation du courriel
else $message_erreur .= 'courriel incorrect'."/n";

if (strlen($T_réponse['objet']) == 0)
	$message_erreur .= 'objet non vide pour obtenir une réponse'."\n";

if (strlen($T_réponse['message']) == 0)
	$message_erreur .= 'message vide'."\n";

$_SESSION['erreur formulaire'] = $message_erreur;

return [$T_réponse['objet'], $T_réponse['message']]; // en cas de manque, on récupère les réponses déjà fournies pour rempli les champ du formuaire. Dans la variable SESSION?
}

list($objet, $message) = Récupérer_paramètres();

if (isset($_SESSION['erreur formulaire']))
	$parametre = "?f=1";
elseif (isset($_SESSION['ID']))
	$parametre = "?p=".Creer_parametre($_SESSION['ID'], $_SESSION['item'], $_SESSION['sous-item']);
else $parametre = '';

header("Location: http://dossiers.techniques.free.fr/index.php".$parametre);
exit;
