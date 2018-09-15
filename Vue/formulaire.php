<section>
<div id=formulaire>
<form method="post" action="Controleur/traitement_formulaire.php">
	<p>Nom		<br><input type="text" name="nom"		value="<?=$_SESSION['nom']?>" /></p>
	<p>Courriel	<br><input type="text" name="courriel"	value="<?=$_SESSION['courriel']?>" /></p>
	<p>Objet	<br><input type="text" name="objet"		placeholder="<?=$CONFIG['objet']?>" /></p>
	<p>Message	<br><textarea name="message" rows="6"></textarea></p>
	<div id=validation>
		<p>Validation du formulaire</p>
		<ul>
			<li>1er caract&egrave;re: </li>
			<li>2e caract&egrave;re: </li>
			<li>3e caract&egrave;re: </li>
			<li>4e caract&egrave;re: </li>
			<li>5e caract&egrave;re: </li>
		</ul>
		<p>Code	<input type="text" name="code" style="width:100px;" /></p>
	</div>
	<p style="text-align:center;">
		<input type="submit" value="Envoyer" style="width:100px; margin-right:200px" />
		<a href="<?=Parametres_support_courant()?>">Page pr&eacute;c&eacute;dente</a>
	</p>
</form>
</div>
</section>
