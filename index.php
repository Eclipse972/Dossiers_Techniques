<?php
/*********************************************************************************************************************************** 
	contrôleur principal
************************************************************************************************************************************/
// mes constantes
define("SUPPORT",		0);
define("ID_SUPPORT", 1);
define("ID_PAGE",		2);

function Extraire_identifiant($param) {
	if(isset($_GET[$param]))			// si le paramètre existe existe 
			return (int) $_GET[$param];	// alors il est converti en nombre entier
	else	return -1;					// -1 est retourné sinon
}

require 'Modele/classe_support.php';
require 'Modele/classe_menu.php';
require 'Controleur/BD.php';

session_start(); // On démarre la session AVANT toute chose

$id = Extraire_identifiant('support');	// si support n'existe pas -1 est renvoyé et cet identifiant est forcément invalide
$_SESSION[SUPPORT] = Selectionne_support($id);
$_SESSION[ID_SUPPORT] = $id;	// variable utilisée pour les liens

if(isset($_SESSION[SUPPORT])) {
	$id = Extraire_identifiant('page');	// si page n'existe pas -1 est renvoyé et cet identifiant est forcément invalide
	$_SESSION[ID_PAGE] = ($_SESSION[SUPPORT]->Page_existe($id)) ? $id : 1;	// si la page n'existe pas ou est inconnue on prend la page 1 par défaut
	include 'Vue/pageHTML.php'; 	// inclut le code de la page
}
else include 'Vue/listeDsupports.php'; // le support n'existe pas ou est inconnu alors on affiche la liste des supports
?>
