<?php
/*********************************************************************************************************************************** 
	contrôleur principal
************************************************************************************************************************************/
// mes constantes
define("SUPPORT",	0);

function Extraire_parametre($param) {
	if(isset($_GET[$param]))			// si le paramètre existe 
			return (int) $_GET[$param];	// alors il est converti en nombre entier
	else	return -1;					// -1 est retourné sinon
}

include 'Modele/mes_classes.php';
require 'Vue/fonctions.php';
include 'Controleur/scripts.php';

session_start(); // On démarre la session AVANT toute chose

$id = Extraire_parametre('support');	// si support n'existe pas -1 est renvoyé et cet identifiant est forcément invalide
$connexionBD = new base2donnees();
$_SESSION[SUPPORT] = $connexionBD->Support($id);
$TRACEUR = new Traceur; // voir avant dernière ligne pour affichage du rapport

$connexionBD->Fermer();

if(isset($_SESSION[SUPPORT])) {
	$item		= Extraire_parametre('item');	// si page n'existe pas -1 est renvoyé et cet identifiant est forcément invalide
	$sous_item	= Extraire_parametre('sous_item');
	if($sous_item == -1) $sous_item++; // si sous-item absent on met à 0
	if ($_SESSION[SUPPORT]->Page_existe($item,$sous_item)) { // si la page n'existe pas ou est inconnue on prend la page mise en situation
		$_SESSION[SUPPORT]->item  = $item;
		$_SESSION[SUPPORT]->sous_item  = $sous_item;
	} else {
		$_SESSION[SUPPORT]->item  = 1;
		$_SESSION[SUPPORT]->sous_item  = 0;
	}
	$code = 'pageHTML'; // code de la page
	$CSS = 'styleDT';
}
else {
	$code = 'listeDsupports'; // le support n'existe pas ou est inconnu alors on affiche la liste des supports
	$CSS = 'style_liste';
}
//*************************************************************************************************************************************
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="Vue/commun.css" />
	<?php echo '<link rel="stylesheet" href="Vue/',$CSS,'.css" />'; ?>
	<title>Les Dossiers techniques de ChristopHe</title>
</head>

<body>

<?php include 'Vue/'.$code.'.php';  ?>

<footer>
<?php	include 'Vue/pied2page.php'; ?>
</footer>

</body>
<?php $TRACEUR->afficher_rapport(); ?>
</html>
