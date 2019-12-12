<?php
require "../Modele/classe_formulaire.php";
session_start();
$_SESSION['formulaire']->Récupérer_données();

if ($_SESSION['formulaire']->OK()) // remplissage du formulaire validé?
	if ($_SESSION['formulaire']->Envoyer_message())	// on essaie d'envoyer le message
		$suite = $this->lien;
	else {
		$_SESSION['erreur'] = 0;
		$suite = "erreur";
	}
else {
	$suite = 'formulaire';
}
	
$parametre = "index.php";
header('Location: http://dossiers.techniques.free.fr/'.$suite.'.php');
exit;
