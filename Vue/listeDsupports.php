<?php
function Gerer_index($NB_colonne) { 
// l'index ne change pas très souvent. Il sera renouvelé seulement en cas de suppression manuelle sur le serveur
$BD = new base2donnees(); // accès à la base de données
$id = 0;
$T_vignettes = $BD->ListeDVignettes();
while (isset($T_vignettes[$id])) {
	$No_colonne = $id % $NB_colonne;
	if($No_colonne==0) echo "\t".'<tr>'."\n"; // nouvelle ligne
	echo "\t\t".'<td>'.$T_vignettes[$id].'</td>'."\n";
	if($No_colonne==$NB_colonne-1) echo "\t".'</tr>'."\n";	// fin de ligne si dernière colonne atteinte
	$id++;
}
// si en sortie on s'arrete sur une colonne autre que la dernière
if($No_colonne!=$NB_colonne-1) echo "\t".'</tr>'."\n"; // on termine la ligne
}
?>

<section>
<h1>Cliquez sur l&apos;image ou le nom du support pour acc&eacute;der &agrave; son dossier technique</h1>
<table>
<?php
$_SESSION['support'] = null;	// on détruit le support en cours
Gerer_index(6);		// affichage du tableau avec le nombre de colonnes en paramètre
?>
</table>
</section>
