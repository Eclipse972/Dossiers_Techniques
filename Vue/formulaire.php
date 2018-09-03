<?php // Vue du formulaire
if (isset($_SESSION['support'])) {
	$_SESSION['ID'] = $id = $_SESSION['support']->ID();
	$_SESSION['item'] = $item = $_SESSION['support']->Item();
	$_SESSION['sous-item'] = $sous_item = $_SESSION['support']->Sous_item();
} else $_SESSION['ID'] = $_SESSION['item'] = $_SESSION['sous-item'] = null;
?>
<section>
<div style="width:600px; margin:auto;">
<h1>En construction</h1>
	<form method="post" action="Controleur/traitement_formulaire.php">
	<?php
		/*if (isset($_SESSION['erreur formulaire']))
			echo $_SESSION['erreur formulaire'];*/
	?>
	<p>Nom		<br><input type="text" name="nom"		style="width: 100%;" value="<?=$_SESSION['nom']?>" /></p>

	<p>Courriel	<br><input type="text" name="courriel"	style="width: 100%;" value="<?=$_SESSION['courriel']?>" /></p>

	<p>Objet	<br><input type="text" name="objet"		style="width: 100%;" placeholder="<?=$CONFIG['objet']?>" /></p>

	<p>Message	<br><textarea name="message" rows="6" style="width: 100%;"></textarea></p>

	<!-- CAPTCHA à venir-->
	<p style="text-align: center;"><input type="submit" value="Envoyer" /></p>
</form>
<a href="<?=(isset($id)) ? '?p='.Creer_parametre($id, $item, $sous_item) : 'index.php'?>">Page pr&eacute;c&eacute;dente</a>
</div>
</section>
