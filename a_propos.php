<?php
/*********************************************************************************************************************************** 
	page à propos d'un support
************************************************************************************************************************************/
session_start(); // On démarre la session AVANT toute chose

if (!isset($_SESSION['support'])) {	// s'il ny a pas de support en cours
	header("Location: http://dossiers.techniques.free.fr/erreur.php?code=404");	// page d'erreur
	exit;
}

require 'Modele/classe_fichier.php';
require 'Controleur/liens.php';
require 'Modele/classe_BD.php';
require 'Modele/classe_support.php';

$oSupport = unserialize($_SESSION['support']);

$BD = new base2donnees();
$code = '<p><u><b>Informations sur la maquette num&eacute;rique</b></u></p>'."\n";
if (isset($oSupport->zip)) {
	$code .= $oSupport->zip->Lien('Cliquez ici pour t&eacute;l&eacute;charger l&apos;archive ZIP de la maquette num&eacute;rique')."\n";
	$Liste = $BD->Description_maquette($oSupport->id);
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
$code .= "\n".'<p><u><b>Liens (dans un nouvel onglet)</b></u></p>';
$Liste = $BD->Lien_support($oSupport->ID());
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
$code .= "\n".Lien('Retour au dossier technique '.$oSupport->Du_support(),$oSupport->ID());
?>

<!doctype html>
<html lang="fr">
<head>
	<?php include('Vue/head_commun.html'); ?>
	<link rel="stylesheet" href="Vue/style_page.css" />
</head>

<body>

<header>
	<div id="logo"><?=$oSupport->Image()?></div>
	<div id="titre"><p class="font-effect-outline">A propos <?=$oSupport->Du_support() ?></p></div>
</header>

<section>
<div style="width:600px; margin:auto;">
<?=$code?>
</div>
</section>

<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
</html>
