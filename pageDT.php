<?php
/*********************************************************************************************************************************** 
	Affichage d'une page d'un support
************************************************************************************************************************************/
require 'Modele/classe_support.php'; //la session contient un objet support donc sa définition doit être appelée en premier
session_start(); // On démarre la session

require 'Controleur/pageDT.php';

$page = new $type_page($Thydrate); // création de l'objet page
?>

<!doctype html>
<html lang="fr">
<head>
<?php include('Vue/head_commun.html'); ?>
	<link rel="stylesheet" href="Vue/pageDT.css"/>
</head>

<body>

<header>
	<div id="logo"><a href="a_propos.php"><?=$_SESSION['support']->Image()?></a></div>
	<div id="titre"><p class="font-effect-outline"><?='Dossier technique '.$_SESSION['support']->Du_support()?></p></div>
</header>

<main role="main"> <!--remarque: <main> suffit à Chrome pour tenir compte de la feuille de style.-->

<?php
define(DUREE, 8);	// durée du cache en heure
$cache = 'Vue/cache/'.$_SESSION['support']->Pti_nom().' '.(string)$_SESSION['support']->ID().'-'.(string)$_SESSION['support']->Item().'-'.(string)$_SESSION['support']->Sous_item().'.cache';
if(file_exists($cache) && (time() - filemtime($cache) < DUREE * 3600))
	readfile($cache);
else {
	ob_start();
	?>
<nav>
<?php
$T_items = $BD->Liste_item();
if(isset($T_items)) {
	echo "<ul>\n";
	foreach($T_items as $i => $item) {	// affichage du menu
		echo $item,"\n";	// lien
		// si item courant = item sélectionné et sous-menu existe alors affichage du sous-menu
		$T_sous_items = $BD->Liste_sous_item();
		if (($i == $_SESSION['support']->Item()) && isset($T_sous_items)) {
			echo "\t<ul>\n";
			foreach($T_sous_items as $sous_item)	echo "\t",$sous_item,"\n";
			echo "\t</ul>\n";
		}
	}
	echo "</ul>\n<a href=index.php>SOMMAIRE</a>\n";
} else trigger_error('Menu inexsistant: identifiant du support='.$this->ID_support."\n". E_USER_WARNING);
?>
</nav>

<section>
<?=$page->Afficher()?>
</section>

<!-- cache généré le <?=date("d/m/Y \à H:i")?>' -->
<?php
	$code = ob_get_contents();
	ob_end_clean();
	file_put_contents($cache, $code);
	echo $code;
}
?>
</main>

<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
<?php $TRACEUR->afficher_rapport();?>
</html>
