<section>
<form method="post" action="Controleur/traitement_formulaire.php" id=formulaire>
	<p>Nom		<br><input type="text" name="nom"		value="<?=$_SESSION['nom']?>" /></p>
	<p>Courriel	<br><input type="text" name="courriel"	value="<?=$_SESSION['courriel']?>" /></p>
	<p>Objet	<br><input type="text" name="objet"		placeholder="<?=$CONFIG['objet']?>" /></p>
	<p>Message	<br><textarea name="message" rows="6"></textarea></p>
	<div id=validation>
		<p>Validation du formulaire</p>
		<ol>
			<li>premier caract&egrave;re du nom</li>
			<li>deuxi&egrave;me caract&egrave;re: de votre courriel</li>
			<li>avant dernier caract&egrave;re: de l&apos;objet</li>
			<li>dernier caract&egrave;re: du message</li>
			<li>troisi&egrave;me caract&egrave;re: du code de validation</li>
		</ol>
		<p>Code	<input type="text" name="code" style="width:100px;" /></p>
	</div>
	<p style="text-align:center;">
		<input type="submit" value="Envoyer" style="width:100px; margin-right:200px" />
		<a href="<?=Parametres_support_courant()?>">Page pr&eacute;c&eacute;dente</a>
	</p>
</form>
</section>
