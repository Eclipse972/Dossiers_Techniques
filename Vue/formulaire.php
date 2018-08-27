<section>
<div style="width:600px; margin:auto;">
<h1>En construction</h1>
<form method="post" action="Controleur/traitement_formulaire.php">
<p>Nom ou pseudo	<input type="text" name="nom"		size="56" /></p>
<p>Courriel			<input type="text" name="courriel"	size="60" /></p>
<p>Objet			<input type="text" name="objet"		size="64" <?php echo $CONFIG['objet'];?>/></p>
<p>Message :		<br><textarea name="message" rows="8" cols="88">Votre message ici.</textarea></p>
</form>
<a href="javascript:history.back()">Page pr&eacute;c&eacute;dente</a>
</div>
</section>
