<section>
<?php // aller chercher les info dans la BD
	$archive = Fichier($_BD->ZIP_Support($_SESSION[ID]), $_SESSION[DOSSIER].'fichiers/');
	if ($archive == '#')
		echo 'D&eacute;sol&eacute;! l&apos;archive n&apos;est pas encore disponible';
	else {
		echo '<a href="'.$archive.'">Cliquez ici pour t&eacute;l&eacute;charger l&apos;archive ZIP de la maquette numérique</a>';
		echo '<p><u>Informations sur la maquette num&eacute;rique</u></p>';
		echo '<p>N&eacute;ant</p>'; // pour le moment
	}
?>
<p><u>Liens divers</u></p>
<?php // aller chercher la liste des liens dans la BD. Notamment le site de l'auteur
	echo '<p>N&eacute;ant</p>'; // pour le moment
	echo Lien('Retour au dossier technique '.$_SESSION[DU], $_SESSION[ID]);
?>
</section>
