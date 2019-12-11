<?php
session_start();
// ce script est exécuté independament de index.php donc il faut inclure les classes utiles
include "liens.php";
include "../Modele/classe_support.php";
include "../Modele/classe_BD.php";

list($objet, $message, $code) = Récupérer_paramètres();

//$validation = unserialize($_SESSION['validation']);

if ((isset($_SESSION['nom'])) && 
	(isset($_SESSION['courriel'])) && 
	(strlen($objet) > 1) && 
	(strlen($message) > 1) && 
	$validation->OK($objet, $message, $code))
{	// enregistrement du message
	if (Envoyer_message($objet, $message))
			$parametre = "index.php";		// retour sur la page index au leu de celle précédant le formulaire
	else	$parametre = "erreur.php";		// problème avec l'envoi du mail
} else		$parametre = "formulaire.php";	// retour au formulaire car non validé

header("Location: http://dossiers.techniques.free.fr/".$parametre);
exit;
