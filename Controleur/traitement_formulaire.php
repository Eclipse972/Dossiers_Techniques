<?php
session_start();
// ce script est exécuté independament de index.php donc il faut inclure les classes utiles
include "liens.php";
include "../Modele/classe_support.php";
include "../Modele/classe_valideur.php";

function Récupérer_paramètres() { // reccueillir les données brutes et les filtrer
$T_réponse = null;
if (!empty($_POST))
	foreach ($_POST as $clé => $valeur) { // examen du tableau $_POST
		if (in_array($clé, array('nom', 'courriel', 'objet', 'message', 'code'))) // clé autorisée ?
			$T_réponse[$clé] = strip_tags($valeur); // on nettoie la valeur
		else { // paramètre non autorisé
			// stockage des infos sur le visiteur qui tente de détourner le formulaire
		}
	}

if (strlen($T_réponse['nom']) > 1) // le nom doit comporter au moins deux caractères à cause du code de validation
	$_SESSION['nom'] = $T_réponse['nom']; // mémorisation du nom

if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $T_réponse['courriel']))
	$_SESSION['courriel'] = $T_réponse['courriel']; // mémorisation du courriel

return [$T_réponse['objet'], $T_réponse['message'], $T_réponse['code']]; 
}

list($objet, $message, $code) = Récupérer_paramètres();

$validation = unserialize($_SESSION['validation']);

if ((isset($_SESSION['nom'])) && 
	(isset($_SESSION['courriel'])) && 
	(strlen($objet) > 1) && 
	(strlen($message) >1) && 
	$validation->OK($objet, $message, $code))
{ // enregistrement du message
	
	$parametre = Parametres_support_courant(); // retour sur la page précédant le formulaire
} else $parametre = "index.php?f=1"; // retour au formulaire

header("Location: http://dossiers.techniques.free.fr/".$parametre);
exit;
