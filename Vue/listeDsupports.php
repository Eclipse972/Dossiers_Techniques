<?php
function Gerer_index($NB_colonne) { 
// l'index ne change pas très souvent. Il sera renouvelé seulement en cas de suppression manuelle sur le serveur
	global $_BD; // accès à la base de données
	$cache = 'Vue/cache/index.cache';
	if(file_exists($cache))
        readfile($cache); // lecture du cache
	else { // création du cache
		$page = ''; // page vide
		$id = 0;
		$T_vignettes = $_BD->ListeDVignettes();
		while (isset($T_vignettes[$id])) {
			$No_colonne = $id % $NB_colonne;
			if($No_colonne==0)	$page .= "\t".'<tr>'."\n"; // nouvelle ligne
			$page .= "\t\t".'<td>'.$T_vignettes[$id].'</td>'."\n";
			if($No_colonne==$NB_colonne-1) $page .= "\t".'</tr>'."\n";	// fin de ligne si dernière colonne atteinte
			$id++;
		}
		// si en sortie on s'arrete sur une colonne autre que la dernière
		if($No_colonne!=$NB_colonne-1) $page .= "\t".'</tr>'."\n"; // on termine la ligne
		$page .= "\t".'<!-- Cache créé le '.date('j/n/Y à G:i:s').' -->'."\n";
		file_put_contents($cache, $page); // écriture du cache
		echo $page; // on affiche notre page
	}
}
?>

<section>
<h1>Cliquez sur l&apos;image ou le nom du support pour acc&eacute;der &agrave; son dossier technique</h1>
<table>
<?php
	$_SESSION = null;	// on détruit le support en cours
	Gerer_index(6);		// affichage du tableau avec le nombre de colonnes en paramètre
?>
</table>
</section>
