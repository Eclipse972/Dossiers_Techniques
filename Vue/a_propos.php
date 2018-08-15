<section>
<?php // aller chercher les info dans la BD
	$archive = Fichier($_BD->ZIP_Support($_SESSION[ID]), $_SESSION[DOSSIER].'fichiers/');
	if ($archive == '#')
		echo 'D&eacute;sol&eacute;! l&apos;archive n&apos;est pas encore disponible';
	else {
		echo '<a href="'.$archive.'">Cliquez ici pour t&eacute;l&eacute;charger l&apos;archive ZIP de la maquette numérique</a>', "\n";
		echo '<p><u><b>Informations sur la maquette num&eacute;rique</b></u></p>', "\n";
		$Liste = $_BD->Description_maquette($_SESSION[ID]);
		if (!isset($Liste))
			echo 'la maquette comporte une configuration &eacute;clat&eacute; et le dessin d&apos;ensemble', "\n";
		elseif (count($Liste) == 1)
			echo '<p>', $Liste[0], '</p>', "\n";
		else {
			echo '<ul>', "\n";
			foreach ($Liste as $texte)	echo '<li>', $texte, '</li>', "\n";
			echo '</ul>', "\n";
		}  
	}

	$Liste = $_BD->Lien_support($_SESSION[ID]);
	if (!isset($Liste)) 
		echo '<p>Pas de lien pour cette maquette</p>', "\n";
	elseif (count($Liste) == 1)
		echo '<p>Lien : ', $Liste[0], '</p>', "\n";
	else {
		echo '<p><u><b>Liens divers (dans un nouvel onglet)</b></u></p>';
		echo '<ul>', "\n";
		foreach ($Liste as $lien)	echo '<li>', $lien, '</li>', "\n";
		echo '</ul>', "\n";
	} 

	echo Lien('Retour au dossier technique '.$_SESSION[DU], $_SESSION[ID]);
?>
</section>
