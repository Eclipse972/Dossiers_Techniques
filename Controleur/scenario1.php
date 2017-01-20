<?php
$id_support = $_GET['id'];
if(isset($LISTE_SUPPORTS[$id_support])) {				// le support existe ?
	$_SESSION[SUPPORT] = $LISTE_SUPPORTS[$id_support];	// on stocke le support dans la session
	$_SESSION[SUPPORT]->Configuration();				// on termine la configuration du support

	/*************************
			 test
	**************************/
	$test = new Interpreteur2commandes();
	$objet = $_SESSION[SUPPORT];	// copie du support pour le test
	$code = $test->Decode($objet->dossier.'configuration.txt', true);
	// affichage des instructions
	echo "<!-- liste des instructions\n";
	foreach ($code as $num => $ligne) {
		echo $ligne['instruction']," ";
		//print_r($ligne['paramètres']);
		echo "\n";
	}
	echo "--!>\n";
	/////////////////////////

	// on affiche la page mise en situation du support
	$param_menu =		'MES';
	$param_sous_menu =	'';
	ob_start();
	include $_SESSION[SUPPORT]->dossier.'MES.php';
	$CONTENU = ob_get_clean();

	include 'Vue/pageHTML.php';
}
else {	// Le support est renseigné mais n'est pas dans la liste
	$_SESSION[SUPPORT] = null;	// on détruit le tableau de session.
	$erreur = 'Le support n&#145;existe pas';
	include 'Vue/erreur.php';	// inclusion de la page d'erreur
}
