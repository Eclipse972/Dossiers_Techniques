<?php
/*********************************************************************************************************************************** 
	formumaire de contact
************************************************************************************************************************************/
require 'Modele/classe_associations.php';
require 'Modele/classe_fichier.php';
require 'Modele/classe_BD.php';
require 'Modele/classe_support.php';
require 'Modele/classe_valideur.php';
require 'Controleur/liens.php';

session_start(); // On démarre la session AVANT toute chose

$BD = new base2donnees();
$valideur = new Valideur();
$_SESSION['validation'] = serialize($valideur);
$_SESSION['temps'] = time();

// contexte
if (isset($_SESSION['support'])) {
	$oSupport = unserialize($_SESSION['support']);
	if ($oSupport->ID() > 0)
		$objet = 'la page &laquo;'.$BD->Texte_item($oSupport->ID(), $oSupport->Item(), $oSupport->Sous_item()).'&raquo; '.$oSupport->Du_support();
	else
		$objet = 'l&apos;archive ZIP';
} else	$objet = 'la liste de supports';
?>

<!doctype html>
<html lang="fr">
<head>
	<?php include('Vue/head_commun.html'); ?>
	<link rel="stylesheet" href="Vue/style_page.css" />
</head>

<body>

<header>
	<div id="logo"><img src="Vue/images/logo.png" alt="logo"></div>
	<div id="titre"><p class="font-effect-outline">Formulaire de contact</p></div>
</header>

<section>
<form method="post" action="Controleur/traitement_formulaire.php" id=formulaire>
	<p>Nom : <input 	 type="text" name="nom"		 value="<?=$_SESSION['nom']?>" /></p>
	<p>Courriel : <input type="text" name="courriel" value="<?=$_SESSION['courriel']?>" /></p>
	<p>Objet : <input	 type="text" name="objet"	 placeholder="<?=$objet?>" /></p>
	<p>Message : <textarea name="message" rows="6"></textarea></p>
	<div id=validation>
		<p>Validation du formulaire</p>
		<ul>
		<?php $valideur->Affiche();?>
		</ul>
		<p>Code	<input type="text" name="code" style="width:100px;" /></p>
	</div>
	<p style="text-align:center;">
		<input type="submit" value="Envoyer" style="width:100px; margin-right:200px" />
		<a href="<?=Parametres_support_courant()?>">Page pr&eacute;c&eacute;dente</a>
	</p>
</form>
</section>

<footer>
<?php include 'Vue/pied2page.php'; ?>
</footer>

</body>
</html>
