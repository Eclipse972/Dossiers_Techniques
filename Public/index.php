<?php	// routeur de PEUNC
session_start();

require 'PEUNC/classes/Page.php';
require 'PEUNC/classes/BDD.php';

// classes utilisateur

try
{
	$BD = new PEUNC\BDD;
	$codeRedirecion = $_SERVER['REDIRECT_STATUS'];
	switch($codeRedirecion) {	// Toutes les erreurs serveur renvoient ici. Cf .htaccess
		case 403:	// accès interdit
		case 500:	// erreur serveur
			list($ALPHA_PEUNC, $BETA_PEUNC, $GAMMA_PEUNC) = [-1, $codeRedirecion, 0];	break;
		case 200:	// le script est lancé sans redirection
			if(empty($_POST)) { // c'est la page d'accueil
				$ALPHA_PEUNC = 0;
			} else {	// traitement de formulaire de contact
				$ALPHA_PEUNC = -2;
			}
			$BETA_PEUNC = $GAMMA_PEUNC	= 0;
			break;
		case 404:	// Ma source d'inspiration: http://urlrewriting.fr/tutoriel-urlrewriting-sans-moteur-rewrite.htm Merci à son auteur
			list($URL, $paramPage, $problem) = explode("?", $_SERVER['REQUEST_URI'], 3);
			if(isset($problem))	throw new Exception("format URL incorrect");
			list($ALPHA_PEUNC, $BETA_PEUNC, $GAMMA_PEUNC) = $BD->CherchePosition($URL);	// compare avec toutes les URL valides du site
			if (isset($ALPHA_PEUNC))	{	// adresse valide, on ne touche à rien
				header("Status: 200 OK", false, 200);	// modification pour dire au navigateur que tout va bien finalement
			} else	list($ALPHA_PEUNC, $BETA_PEUNC, $GAMMA_PEUNC) = [-1, 404, 0];	// l'adresse invalide reste affichée dans la barre d'adresse'
			break;
		default:
			list($ALPHA_PEUNC, $BETA_PEUNC, $GAMMA_PEUNC) = [-1, 0, 0];	// erreur inconnue
	}

	$classePage = $BD->ClassePage($ALPHA_PEUNC, $BETA_PEUNC, $GAMMA_PEUNC);
	if (!isset($classePage))	throw new Exception("La classe de page n&apos;est pas d&eacute;finie dans le squelette.");

	PEUNC\Page::SauvegardeEtat();	// sauvegarde de l'état courant
	list($_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']) = [$ALPHA_PEUNC, $BETA_PEUNC, $GAMMA_PEUNC];// MAJ de l'état'
	// $_SESSION = array('alpha' => $ALPHA_PEUNC, 'beta' = $BETA_PEUNC, 'gamma' => $GAMMA_PEUNC) détruirait les autres éventuels paramètres stockés dans la sesion

	require"Modele/classe_{$classePage}.php";
	$PAGE = new $classePage(explode("/", $paramPage));
	$PAGE->ExecuteControleur($_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']);
}
catch(Exception $e)
{
	require"Modele/classe_PageErreur.php";
	$PAGE = new PageErreur;
	$PAGE->setCodeErreur("application");
	$PAGE->setTitreErreur($e->getMessage());
	$PAGE->setCorpsErreur("<p>Noeud {$ALPHA_PEUNC} - {$BETA_PEUNC} - {$GAMMA_PEUNC}</p>");
}

include $PAGE->getView(); // insertion de la vue
