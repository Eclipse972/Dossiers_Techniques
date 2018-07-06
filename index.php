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
define("TITRE",		7);
define("origine",	64); // code asci de @

include 'Modele/mes_classes.php';
require 'Vue/fonctions.php';
include 'Controleur/scripts.php';

session_start(); // On démarre la session AVANT toute chose

$TRACEUR = new Traceur; // voir avant dernière ligne pour affichage du rapport

//extraction du paramètre
if(isset($_GET["p"]))	// si le paramètre existe 
	$param = substr((string) $_GET["p"],0,3);	// alors il est converti en nombre chaîne de 3 caractères
else $param = null;

$id			= (isset($param[0])) ? ord($param[0])-origine : -1;
$item		= (isset($param[1])) ? ord($param[1])-origine : 1;
$sous_item	= (isset($param[2])) ? ord($param[2])-origine : 0;

$connexionBD = new base2donnees();
$_SESSION = $connexionBD->Support($id); // création du support s'il existe
// suivant l'existence du support
if (isset($_SESSION)) { // si le support existe
	$connexionBD = new base2donnees;
	$page_existe = $connexionBD->Page_existe($_SESSION[ID], $item, $sous_item);
	$_SESSION[ITEM]		 = ($page_existe) ? $item		: 1;
	$_SESSION[SOUS_ITEM] = ($page_existe) ? $sous_item	: 0;
}
//*************************************************************************************************************************************
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:400,700&effect=outline">
	<link rel="stylesheet" href="Vue/commun.css" />
	<link rel="stylesheet" href="Vue/<?php echo (isset($_SESSION)) ? 'styleDT' : 'style_liste'; ?>.css" />
	<title>Les Dossiers techniques de ChristopHe</title>
</head>

<body>

<header>
	<?php echo (isset($_SESSION)) ? $_SESSION[IMAGE] : ''; ?>
	<p class="font-effect-outline"><?php echo (isset($_SESSION)) ? $_SESSION[TITRE] : 'Liste des dossiers techniques'; ?></p>
</header>

<?php
	$code = (isset($_SESSION)) ? 'pageHTML' : 'listeDsupports';
	include 'Vue/'.$code.'.php';
?>
<footer>
<?php	include 'Vue/pied2page.php'; ?>
</footer>

</body>
<?php $TRACEUR->afficher_rapport(); ?>
</html>
