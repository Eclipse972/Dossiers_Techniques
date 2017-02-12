<?php
/*********************************************************************************************************************************** 
	contrôleur principal
************************************************************************************************************************************/
// mes constantes
define("SUPPORT", '_support');
define("UTILISATEUR", '_utilisateur');

require 'Controleur/fonctions.php';			// quelques fonctions utiles
require 'Modele/classe_support.php';
require 'Modele/classe_menu.php';

$LISTE_SUPPORTS = array(
//	new Support('nom',								'pti_nom',			'dossier')
	new Support('bouton poussoir',					'BP',				'BP'),
	new Support('but&eacute;e 5 axes',				'butee', 			'butee5axes'),
	new Support('cambreuse',						'cambreuse',		'cambreuse'),
	new Support('cric bouteille',					'cric',				'cric_bouteille'),
	new Support('cric hydraulique 2 tonnes',		'cric',				'cric_hydraulique'),
	new Support('&eacute;lectrovanne',				'electrovanne',		'electrovanne'),
	new Support('&eacute;tau de mod&eacute;lisme',	'etau',				'etau'),
	new Support('extracteur de roulement',			'extracteur',		'extracteur2roulement'),
	new Support('mini coupe-tube',					'mini_coupe-tube',	'coupe-tube'),
	new Support('pince de marquage',				'pince',			'x2marquage'),
	new Support('pince de robot',					'pince',			'pince2robot'),
	new Support('pompe &agrave; palettes',			'pompe',			'pompeApalettes'),
	new Support('vanne sph&eacute;rique',			'vanne',			'vanne')
);

session_start(); // On démarre la session AVANT toute chose

$id = Extraire_identifiant('support');	// si support n'existe pas -1 est renvoyé et cet identifiant est forcément invalide
if(isset($LISTE_SUPPORTS[$id])) {
	$_SESSION[SUPPORT] = $LISTE_SUPPORTS[$id];
	$_SESSION[ID_SUPPORT] = $id;
	$_SESSION[MENU] = new Menu($_SESSION[SUPPORT]->dossier);
	$_SESSION[MENU]->Configurer_menu();
	$id = Extraire_identifiant('page');	// si page n'existe pas -1 est renvoyé et cet identifiant est forcément invalide
	$_SESSION[ID_PAGE] = (isset($_SESSION[MENU]->T_page[$id])) ? $id : $_SESSION[ID_PAGE] = 1;	// si la page n'existe pas ou est inconnue on prend la page 1 par défaut
	include 'Vue/pageHTML.php'; 	// inclut le code de la page
	
} else include 'Vue/listeDsupports.php'; // le support n'existe pas ou est inconnu alors on affiche la liste des supports

?>
