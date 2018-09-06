<section>
<div style="width:600px; margin:auto;">
<h1>Non fonctionnel pour le moment</h1>
<p>Tous les champs sont obligatoires</p>
	<form method="post" action="Controleur/traitement_formulaire.php">
	<p>Nom		<br><input type="text" name="nom"		style="width: 100%;" value="<?=$_SESSION['nom']?>" /></p>

	<p>Courriel	<br><input type="text" name="courriel"	style="width: 100%;" value="<?=$_SESSION['courriel']?>" /></p>

	<p>Objet	<br><input type="text" name="objet"		style="width: 100%;" placeholder="<?=$CONFIG['objet']?>" /></p>

	<p>Message	<br><textarea name="message" rows="6" style="width: 100%;"></textarea></p>

	<!-- CAPTCHA à venir-->
	<p style="text-align: center;"><input type="submit" value="Envoyer" /></p>
</form>
<a href="<?=Parametres_support_courant()?>">Page pr&eacute;c&eacute;dente</a>
</div>
</section>
