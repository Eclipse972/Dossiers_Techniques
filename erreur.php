<?php
/*********************************************************************************************************************************** 
	contrôleur principal
************************************************************************************************************************************/
require 'Modele/classe_associations.php';
require 'Modele/classe_fichier.php';
require 'Modele/classe_BD.php';
require 'Modele/classe_menu.php';
require 'Modele/classe_traceur.php';
require 'Modele/classe_support.php';
require 'Modele/classe_valideur.php';
require 'Controleur/liens.php';
require 'Controleur/cache.php';

session_start(); // On démarre la session AVANT toute chose

$TRACEUR = new Traceur; // voir avant dernière ligne pour affichage du rapport
// détermination du mode pour le traitement et l'affichage
if ((empty($_GET)) || (preg_match("#^[a-zA-Z0-9]{1,3}$#", $_GET["p"])))
	$MODE = 'DT';
elseif (isset($_GET["f"]))
	$MODE = 'formulaire';
else
	$MODE = 'erreur';
include 'Controleur/'.$MODE.'.php';
/* chacun des controleur renvoie la configuration sous la forme d'un tableau associatif
 * css
 * logo
 * titre
 * page
 * cache: si non défini => pas de cache
 * paramètre supplémentaire dans ertain cas
 */
$CONFIG = Configurer();
?>
<!doctype html>
<html lang="fr">
<head>
	<?php include('Vue/head_commun.html'); ?>
	<link rel="stylesheet" href="Vue/<?=$CONFIG['css']?>.css" />
</head>

<body>

<header>
	<div id="logo"><?=$CONFIG['logo']?></div>
	<div id="titre"><p class="font-effect-outline"><?=$CONFIG['titre']?></p></div>
</header>

<?php
if (isset($CONFIG['cache']))
	Gérer_cache($CONFIG['cache'], 0, $CONFIG['page']); // durée de vie en heure. Mettre à zéro lorsque j'interviens sur le site
else include 'Vue/'.$CONFIG['page'].'.php';
?>
<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
<?php $TRACEUR->afficher_rapport();?>
</html>
