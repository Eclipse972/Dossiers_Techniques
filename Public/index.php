<?php	// routeur de PEUNC
session_start();
/* contexte sauvegardé dans la session (alpha, beta, gamma) par importance décroissante
	Si alpha >=0 => pages du site
	(X;0;0) => page de 1er niveau. 	(0;0;0) -> page d'accueil.

	(X;Y;0) avec Y>0 => page de 2e niveau

	(X;Y;Z) avec Z>0 => page de 3e niveau

	si alpha<0 => page spéciales PEUNC
	(-1;code;0) -> page d'erreur avec son code
	(-2;0;0) formulaire de contact
*/

require 'PEUNC/classes/Page.php';
require 'PEUNC/classes/BDD.php';

// classes utilisateur

// dernière page consultée
if (isset($_SESSION['alpha']))									// défini => une page a été consultée
{
	if (($_SESSION['alpha'] > 1) || ($_SESSION['alpha'] == 0))	// cette page est celle d'un support ou la page d'accueil
			$T_etatPrecedent = [$_SESSION['alpha'],			$_SESSION['beta'],			$_SESSION['gamma']];			// sauvegarde état actuel
	else	$T_etatPrecedent = [$_SESSION['alphaPrecedent'],$_SESSION['betaPrecedent'],	$_SESSION['gammaPrecedent']];	// l'état précédent reste le même pour toutes les autres pages (contact, erreur, ...)
}
else		$T_etatPrecedent = [	0,							0,							0];							// alpha non défini => on vient de l'ailleurs. On mémorise la page d'accueil

list($_SESSION['alphaPrecedent'], $_SESSION['betaPrecedent'], $_SESSION['gammaPrecedent']) = $T_etatPrecedent;

try
{
	$BD = new PEUNC\classes\BDD;
	$codeRedirecion = $_SERVER['REDIRECT_STATUS'];
	switch($codeRedirecion) {	// Toutes les erreurs serveur renvoient ici. Cf .htaccess
		case 403:	// accès interdit
		case 500:	// erreur serveur
			list($_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']) = [-1, $codeRedirecion, 0];	break;
		case 200:	// le script est lancé sans redirection => page d'accueil
			$_SESSION['alpha'] = $_SESSION['beta'] = $_SESSION['gamma']	= 0;
			break;
		case 404:	// Ma source d'inspiration: http://urlrewriting.fr/tutoriel-urlrewriting-sans-moteur-rewrite.htm Merci à son auteur
			list($URL, $paramPage, $problem) = explode("?", $_SERVER['REQUEST_URI'], 3);
			if(isset($problem))	throw new Exception("format URL incorrect");
			list($alpha, $beta, $gamma) = $BD->CherchePosition($URL);	// compare avec toutes les URL valides du site
			if (isset($alpha))	{	// adresse valide, on ne touche à rien
				header("Status: 200 OK", false, 200);	// modification pour dire au navigateur que tout va bien finalement
				list($_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']) = [$alpha, $beta, $gamma];	// $_SESSION = array('alpha' => $alpha, 'beta' = $beta, 'gamma' => $gamma) détruirait les autres éventuels paramètres
			} else	list($_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']) = [-1, 404, 0];	// l'adresse invalide reste affichée dans la barre d'adresse'
			break;
		default:
			list($_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']) = [-1, 0, 0];	// erreur inconnue
	}

	$classePage = $BD->ClassePage($_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']);
	if (!isset($classePage))	throw new Exception("La classe {$classePage} n&apos;est pas d&eacute;finie dans le squelette.");
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
	$PAGE->setCorpsErreur("<p>Noeud {$_SESSION['alpha']} - {$_SESSION['beta']} - {$_SESSION['gamma']}</p>");
}

include $PAGE->getView(); // insertion de la vue
