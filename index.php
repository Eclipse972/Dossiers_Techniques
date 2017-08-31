<?php
/*********************************************************************************************************************************** 
	contrôleur principal
************************************************************************************************************************************/
// mes constantes
define("SUPPORT",	0);

function Extraire_identifiant($param) {
	if(isset($_GET[$param]))			// si le paramètre existe 
			return (int) $_GET[$param];	// alors il est converti en nombre entier
	else	return -1;					// -1 est retourné sinon
}

require 'Modele/classe_support.php';
require 'Modele/classe_associations.php';
require 'Modele/classe_BD.php';
require 'Vue/fonctions.php';
require 'Controleur/cache.php';

session_start(); // On démarre la session AVANT toute chose

$id = Extraire_identifiant('support');	// si support n'existe pas -1 est renvoyé et cet identifiant est forcément invalide
$connexionBD = new base2donnees();
$_SESSION[SUPPORT] = $connexionBD->Support($id);
$connexionBD->Fermer();

if(isset($_SESSION[SUPPORT])) {
	$item		= Extraire_identifiant('item');	// si page n'existe pas -1 est renvoyé et cet identifiant est forcément invalide
	$sous_item	= Extraire_identifiant('sous_item');
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
<div id="page"><!-- contient tout l'affichage -->

<?php include 'Vue/'.$code.'.php';  ?>

<footer>
<?php	include 'Vue/pied2page.php'; ?>
</footer>

</div>

</body>

</html>
