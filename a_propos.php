<?php
/*********************************************************************************************************************************** 
	page à propos d'un support
************************************************************************************************************************************/
require 'Modele/classe_fichier.php';
require 'Modele/classe_support.php';
session_start();

if (!isset($_SESSION['support'])) {	// s'il ny a pas de support en cours
	$_SESSION['erreur'] = 404;
	header("Location: http://dossiers.techniques.free.fr/erreur.php");	// page d'erreur
	exit;
}
require 'Controleur/liens.php';
require 'Modele/classe_BD.php';

function Code_Liste($Liste, $description_maquette){
	switch(count($Liste)) {
	case 0:
		$code =  '<p>'.(($description_maquette) ?
				'la maquette comporte une configuration &eacute;clat&eacute; et le dessin d&apos;ensemble' :
				'Aucun pour le moment').'</p>';
		break;
	case 1:
		$code = '<p>'.$Liste[0].'</p>';
		break;
	default:
		$code = '<ul>'."\n";
		foreach ($Liste as $ligne)	$code .= '<li>'.$ligne.'</li>'."\n";
		$code .= '</ul>';
	}
	return $code;
}
$BD = new base2donnees();
$zip = ($_SESSION['support']->Zip_existe()) ?
		$_SESSION['support']->Zip()."\n".Code_Liste($BD->Description_maquette(), true) : // lien + description
		'<p>D&eacute;sol&eacute;! l&apos;archive n&apos;est pas encore disponible</p>';
$liens = Code_Liste($BD->Lien_support(), false);
$retour=Lien('Retour au dossier technique '.$_SESSION['support']->Du_support(),$_SESSION['support']->ID(),$_SESSION['support']->Item(),$_SESSION['support']->Sous_item())
?>

<!doctype html>
<html lang="fr">
<head>
<?php include('Vue/head_commun.html'); ?>
</head>

<body>

<header>
	<div id="logo"><?=$_SESSION['support']->Image()?></div>
	<div id="titre"><p class="font-effect-outline">A propos <?=$_SESSION['support']->Du_support()?></p></div>
</header>

<section>
<div style="width:700px; margin:auto;">
<p><u><b>La maquette num&eacute;rique</b></u></p>
<?=$zip?>

<p><u><b>Liens (ouverture dans un nouvel onglet)</b></u></p>
<?php echo $liens, $retour;?>
</div>
</section>

<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
</html>
