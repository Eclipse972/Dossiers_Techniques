<?php
/*********************************************************************************************************************************** 
	Affiche la liste des supports
************************************************************************************************************************************/
session_start(); // On démarre la session AVANT toute chose

require 'Modele/classe_fichier.php';
require 'Modele/classe_BD.php';
require 'Modele/classe_support.php';
require 'Controleur/liens.php';

define(DUREE, 12);	// durée du cache en heure
define(CACHE, 'Vue/cache/index.cache');	// nom du fichier cache

$_SESSION['support'] = null;	// on détruit le support en cours

function Gerer_index($NB_colonne) { 
// l'index ne change pas très souvent. Il sera renouvelé seulement en cas de suppression manuelle sur le serveur
$BD = new base2donnees(); // accès à la base de données
$id = 0;
$T_vignettes = $BD->ListeDVignettes();
while (isset($T_vignettes[$id])) {
	$No_colonne = $id % $NB_colonne;
	if($No_colonne==0) echo "\t".'<tr>'."\n"; // nouvelle ligne
	echo "\t\t".'<td>'.$T_vignettes[$id].'</td>'."\n";
	if($No_colonne==$NB_colonne-1) echo "\t".'</tr>'."\n";	// fin de ligne si dernière colonne atteinte
	$id++;
}
// si en sortie on s'arrete sur une colonne autre que la dernière
if($No_colonne!=$NB_colonne-1) echo "\t".'</nomenclaturetr>'."\n"; // on termine la ligne
}

?>
<!doctype html>
<html lang="fr">
<head>
	<?php include('Vue/head_commun.html'); ?>
	<link rel="stylesheet" href="Vue/style_page.css"/>
</head>

<body>

<header>
	<div id="logo"><img src="Vue/images/logo.png" alt="logo"></div>
	<div id="titre"><p class="font-effect-outline">Liste des dossiers techniques</p></div>
</header>

<section>
<h1>Cliquez sur l&apos;image ou le nom du support pour acc&eacute;der &agrave; son dossier technique</h1>
<table>
<?php
if(file_exists(CACHE) && (time() - filemtime(CACHE) < DUREE * 3600))
	readfile(CACHE);
else {
	ob_start();
	Gerer_index(5);		// affichage du tableau avec le nombre de colonnes en paramètre
	echo '<!-- cache généré le ', date("d/m/Y \à H:i"),' -->', "\n";
	$code = ob_get_contents();
	ob_end_clean();
	file_put_contents(CACHE, $code);
	echo $code;
}
?>
</table>
</section>
<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
</html>
