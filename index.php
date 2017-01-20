<?php
/*********************************************************************************************************************************** 
	contrôleur principal
************************************************************************************************************************************/
// mes constantes
define("SUPPORT", '_support');
define("UTILISATEUR", '_utilisateur');

require 'Controleur/fonctions.php';			// quelques fonctions utiles
require 'Modele/classe_interpreteur2commandes.php';
require 'Modele/classe_association.php';
require 'Modele/classe_support.php';

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

// test de l'existence des paramètres dans l'URL. il y en 3: id, menu et ss_menu. L'existence du dernier n'est pas vérifiée
if(isset($_GET['id']))
		$scenario = 1;
else	$scenario = 3;
if(isset($_GET['menu'])) $scenario--;

switch($scenario) {
case 1: // id est défini et menu non => création du support puis stockage dans la session si pas d'erreur
	include 'Controleur/scenario1.php';
	break;
case 2: // id non défini et menu défini => on recherche la page du DT et on l'affiche
	include 'Controleur/scenario2.php';	// détermine le code à afficher en fonction des paramètres
	include 'Vue/pageHTML.php'; 			// inclut le code de la page
	break;
case 3: // id et menu non définis => on affiche la liste des supports
	include 'Vue/listeDsupports.php'; // inclusion de la page liste des supports
	break;
default: // id et menu sont définis => que faire ?
	$_SESSION[SUPPORT] = null;	// on détruit le tableau de session.
	$erreur = 'Erreur sur les param&egrave;tres';
	include 'Vue/erreur.php';	// inclusion de la page d'erreur
}
?>