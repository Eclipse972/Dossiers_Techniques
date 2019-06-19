<?php
/*********************************************************************************************************************************** 
	page à propos d'un support
************************************************************************************************************************************/
require 'Modele/classe_fichier.php';
require 'Modele/classe_support.php';
session_start();

if (!isset($_SESSION['support'])) {	// s'il ny a pas de support en cours
	header("Location: http://dossiers.techniques.free.fr/erreur.php?code=404");	// page d'erreur
	exit;
}
require 'Controleur/liens.php';
require 'Modele/classe_BD.php';

$BD = new base2donnees();
$code = '<p><u><b>La maquette num&eacute;rique</b></u></p>'."\n";
if ($_SESSION['support']->Zip_existe()) {
	$code .= $_SESSION['support']->Zip()."\n";
	$Liste = $BD->Description_maquette();
	switch(count($Liste)) {
	case 0:
		$code .= '<p>la maquette comporte une configuration &eacute;clat&eacute; et le dessin d&apos;ensemble</p>';
		break;
	case 1:
		$code .= '<p>'.$Liste[0].'</p>';
		break;
	default:
		$code .= '<ul>'."\n";
		foreach ($Liste as $texte)	$code .= '<li>'.$texte.'</li>'."\n";
		$code .= '</ul>';
	}
} else $code .= '<p>D&eacute;sol&eacute;! l&apos;archive n&apos;est pas encore disponible</p>';
$code .= "\n".'<p><u><b>Liens (ouverture dans un nouvel onglet)</b></u></p>';
$Liste = $BD->Lien_support();
switch(count($Liste)) {
case 0:
	$code .= '<p>Aucun pour le moment</p>';
	break;
case 1:
	$code .= '<p>'.$Liste[0].'</p>';
	break;
default:
	$code .= '<ul>'."\n";
	foreach ($Liste as $lien)
		$code .= '<li>'.$lien.'</li>'."\n";
	$code .= '</ul>';
}
$code .= "\n".Lien('Retour au dossier technique '.$_SESSION['support']->Du_support(),$_SESSION['support']->ID(),$_SESSION['support']->Item(),$_SESSION['support']->Sous_item());
?>

<!doctype html>
<html lang="fr">
<head>
	<?php include('Vue/head_commun.html'); ?>
	<link rel="stylesheet" href="Vue/style_page.css" />
</head>

<body>

<header>
	<div id="logo"><?=$_SESSION['support']->Image()?></div>
	<div id="titre"><p class="font-effect-outline">A propos <?=$_SESSION['support']->Du_support() ?></p></div>
</header>

<section>
<div style="width:700px; margin:auto;">
<?=$code?>
</div>
</section>

<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
</html>
