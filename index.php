<?php
/*********************************************************************************************************************************** 
	contrôleur principal
************************************************************************************************************************************/
// mes constantes
define("SUPPORT",		0);
define("ID_SUPPORT", 1);
define("ID_PAGE",		2);
define("NB_SUPPORT", 13);

function Extraire_identifiant($param) {
	if(isset($_GET[$param]))			// si le paramètre existe existe 
			return (int) $_GET[$param];	// alors il est converti en nombre entier
	else	return -1;					// -1 est retourné sinon
}
function Selectionne_support($id) {
	switch($id) {
		case  0: return new Support('bouton poussoir',					'BP',				'BP');
		case  1: return new Support('but&eacute;e 5 axes',				'butee', 		'butee5axes',		'de la ','la ');
		case  2: return new Support('cambreuse',							'cambreuse',	'cambreuse',		'de la ','la ');
		case  3: return new Support('cric bouteille',					'cric',			'cric_bouteille');
		case  4: return new Support('cric hydraulique 2 tonnes',		'cric',			'cric_hydraulique');
		case  5: return new Support('&eacute;lectrovanne',				'electrovanne','electrovanne',			'de l&apos;','l&apos;');
		case  6: return new Support('&eacute;tau de mod&eacute;lisme','etau',		'etau',						'de l&apos;','l&apos;');
		case  7: return new Support('extracteur de roulement',		'extracteur',	'extracteur2roulement',	'de l&apos;','l&apos;');
		case  8: return new Support('mini coupe-tube',					'mini_coupe-tube','coupe-tube');
		case  9: return new Support('pince de marquage',				'pince',			'x2marquage',		'de la ','la ');
		case 10: return new Support('pince de robot',					'pince',			'pince2robot',		'de la ','la ');
		case 11: return new Support('pompe &agrave; palettes',		'pompe',			'pompeApalettes', 'de la ','la ');
		case 12: return new Support('vanne sph&eacute;rique',			'vanne',			'vanne',				'de la ','la ');
		default: return null;	// mettre à jour la constante NB_SUPPORT pour toute modification
	}
}

require 'Modele/classe_support.php';
require 'Modele/classe_menu.php';

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
