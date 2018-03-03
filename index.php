<?php
/*********************************************************************************************************************************** 
	contrôleur principal
************************************************************************************************************************************/
// mes constantes
define("ID",		1);
define("PTI_NOM",	2);
define("DOSSIER",	3);
define("ITEM",		4);
define("SOUS_ITEM",	5);
define("IMAGE",		6);
define("TITREE",	7);

function Extraire_parametre($param) {
	if(isset($_GET[$param]))			// si le paramètre existe 
			return (int) $_GET[$param];	// alors il est converti en nombre entier
	else	return -1;					// -1 est retourné sinon
}

include 'Modele/mes_classes.php';
require 'Vue/fonctions.php';
include 'Controleur/scripts.php';

session_start(); // On démarre la session AVANT toute chose

$TRACEUR = new Traceur; // voir avant dernière ligne pour affichage du rapport

$id = Extraire_parametre('support');	// si support n'existe pas -1 est renvoyé et cet identifiant est forcément invalide
$connexionBD = new base2donnees();
$_SESSION = $connexionBD->Support($id);
$connexionBD->Fermer();

$code = (isset($_SESSION)) ? 'pageHTML' : 'listeDsupports'; // code de la page suivat l'existence du support
$CSS  = (isset($_SESSION)) ? 'styleDT'	: 'style_liste'; 

if(isset($_SESSION)) { // si le support existe
	$item		= Extraire_parametre('item');	// si page n'existe pas -1 est renvoyé et cet identifiant est forcément invalide
	$sous_item	= Extraire_parametre('sous_item');
	if ($sous_item == -1) $sous_item++; // si le sous-item n'existe pas on remplace par 0
	$connexionBD = new base2donnees;
	$page_existe = $connexionBD->Page_existe($_SESSION[ID], $item, $sous_item);
	$connexionBD->Fermer();

	$_SESSION[ITEM]		 = ($page_existe) ? $item		: 1;
	$_SESSION[SOUS_ITEM] = ($page_existe) ? $sous_item	: 0;
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
