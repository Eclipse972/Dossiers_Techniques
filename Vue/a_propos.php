<section>
<?php // aller chercher les info dans la BD
	$archive = Fichier($_BD->ZIP_Support($_SESSION[ID]), $_SESSION[DOSSIER].'fichiers/');
	if ($archive == '#')
		echo '<p>D&eacute;sol&eacute;! l&apos;archive n&apos;est pas encore disponible</p>';
	else {
		echo '<a href="'.$archive.'">Cliquez ici pour t&eacute;l&eacute;charger l&apos;archive ZIP de la maquette numérique</a>', "\n";
		echo '<p><u><b>Informations sur la maquette num&eacute;rique</b></u></p>', "\n";
		$Liste = $_BD->Description_maquette($_SESSION[ID]);
		switch(count($Liste)) {
		case 0:
			echo '<p>la maquette comporte une configuration &eacute;clat&eacute; et le dessin d&apos;ensemble</p>';
			break;
		case 1:
			echo '<p>', $Liste[0], '</p>';
			break;
		default:
			echo '<ul>', "\n";
			foreach ($Liste as $texte)	echo '<li>', $texte, '</li>', "\n";
			echo '</ul>';
		}
	}
	echo "\n";
	
	echo '<p><u><b>Liens (dans un nouvel onglet)</b></u></p>';
	$Liste = $_BD->Lien_support($_SESSION[ID]);
	switch(count($Liste)) {
	case 0:
		echo '<p>Aucun pour le moment</p>';
		break;
	case 1:
		echo '<p>', $Liste[0], '</p>';
		break;
	default:
		echo '<ul>', "\n";
		foreach ($Liste as $lien)	echo '<li>', $lien, '</li>', "\n";
		echo '</ul>';
	}
	echo "\n";

	echo Lien('Retour au dossier technique '.$_SESSION[DU], $_SESSION[ID]);
?>
</section>
