<section>
<div style="width:600px; margin:auto;">
<h1>En construction</h1>
	<form method="post" action="Controleur/traitement_formulaire.php">
	<p>Nom		<br><input type="text" name="nom"		style="width: 100%;" value="<?=$_SESSION['nom']?>" /></p>
	<p>Courriel	<br><input type="text" name="courriel"	style="width: 100%;" value="<?=$_SESSION['courriel']?>" /></p>
	<p>Objet	<br><input type="text" name="objet"		style="width: 100%;" placeholder="<?=$CONFIG['objet']?>"/></p>
	<p>Message :</p><textarea name="message" rows="8" style="width: 100%;"></textarea>
<!-- CAPTCHA à venir-->
	<p style="text-align: center;"><input type="submit" value="Envoyer" /></p>
</form>
<a href="?p=<?=Creer_parametre($SUPPORT->ID(), $SUPPORT->Item(), $SUPPORT->Sous_item())?>">Page pr&eacute;c&eacute;dente</a>
</div>
</section>
