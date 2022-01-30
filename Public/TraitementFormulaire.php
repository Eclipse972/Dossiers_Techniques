<?php	// Test de traitement du formulaire
/* La pseudo réécriture d'URL ne foncfionne pas avec le nom du script dans le formulaire
 * Il est apparement obligatoire de passez par un script réel
 * */
session_start();
// lecture du tableau $_POST
foreach ($_POST as $clé => $valeur)
	if (in_array($clé, array("nom", "courriel", "objet", "message", "code"))) // clé autorisée ?
		$_SESSION["formulaire"][$clé] = strip_tags($valeur); // on stocke la valeur dans la session
	else { // clé inconnue
		header("Location:/"); // Redirection
		exit;
	}

//test de validité des champs;
$_SESSION["formulaire"]["ErreurNom"] = (strlen($_SESSION["formulaire"]["nom"]) < 2);
$_SESSION["formulaire"]["ErreurCourriel"] = (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_SESSION["formulaire"]["courriel"]) != 1);
$_SESSION["formulaire"]["ErreurObjet"] = (strlen($_SESSION["formulaire"]["objet"]) < 2);
$_SESSION["formulaire"]["ErreurMessage"] = (strlen($_SESSION["formulaire"]["message"]) < 2);

if (	$_SESSION["formulaire"]["ErreurNom"]
	||	$_SESSION["formulaire"]["ErreurCourriel"]
	||	$_SESSION["formulaire"]["ErreurObjet"]
	||	$_SESSION["formulaire"]["ErreurMessage"])
{
	header("Location:/Contact"); // Redirection vers le formulaire de contact car il y a erreur
	exit;
}

// Envoi du message

// une fois le message envoyé
$_SESSION["formulaire"]["objet"] = $_SESSION["formulaire"]["message"] = ""; // tandis que le nom et le courriel sont conservés
// redirection vers page précédente
header("Location:/"); // comment récupére l'URL?
