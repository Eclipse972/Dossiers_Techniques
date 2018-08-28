<?php
// reccueillir les données brutes et les filtrer
function Récupérer_paramètres() {
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
	else { // paramètre non autorisé => tentative de détournement du formulaire
		$erreur = true; // dans le futur: stockage des infos sur le visiteur
		exit; // sortie de la boucle
	}
}
if (!$erreur) {
	// on vérifie que la listes des paramètre est complète
	$message = '';
	foreach ($T_autorisé as $clé => $valeur)
		if (!isset($T[$clé])) $message .= $clé.' est manquant'."\n";
	
}
return $T_réponse; // en cas de manque, on récupère les réponses déjà fournies pour rempli les champ du formuaire. Dans la variable SESSION?
}

