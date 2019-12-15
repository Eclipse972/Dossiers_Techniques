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

function Lien($texte, $support, $item = null, $sous_item = 0) {
/*
 A propos des paramètres transmis par l'URL
 * s : identifiant du support sous for d'un nombre avec 2 chiffres maximum.
 * m : la position dans le menu transmis sous la forme d'un ou deux minuscules
 * 		la premire pour l'item et la seconde pour le sous-item
 * 		a->0, b->1, ...
 * Remarques:
 * - Le code ASCII de 'a' est 97
 * - une minuscule offre 26 possibilités pour item et sous-item ce qui est largement suffisant
 * - dans le BD la vue nommée Vue_code_menu utilise la même structure
 * - l'existence de la page correpondante doit être vérifiée en amont
 */
	if (isset($item)) {
		$menu = '&m='.chr($item+97);
		if ($sous_item > 0)	$menu .= chr($sous_item+97);
	} else $menu = '';
	return '<a href="pageDT.php?s='.(string)$support.$menu.'">'.$texte.'</a>';
}

require 'Modele/classe_BD.php';
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
<?php echo $liens, "\n", $retour;?>
</div>
</section>

<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
</html>
