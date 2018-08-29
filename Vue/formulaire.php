<section>
<div style="width:600px; margin:auto;">
<h1>En construction</h1>
	<orm method="post" action="Controleur/traitement_formulaire.php">
	<p>Nom		<input type="text" name="nom"		size="56" /></p>
	<p>Courriel	<input type="text" name="courriel"	size="60" /></p>
	<p>Objet	<input type="text" name="objet"		size="64" placeholder="<?=$CONFIG['objet']?>"/></p>
	<p>Message :<br><textarea name="message" rows="8" cols="88"></textarea></p>
<!-- CAPTCHA à venir-->
	<p><input type="submit" value="Envoyer" /></p>
</form>
<a href="?p=<?=Creer_parametre($_SESSION['support']->ID(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item())?>">Page pr&eacute;c&eacute;dente</a>
</div>
</section>
