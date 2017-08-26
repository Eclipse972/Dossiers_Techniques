<?php	// construit le tableau pour l'affichage
$NB_colonne = 5;
$id = 0;
$connexionBD = new base2donnees();
while (($vignette = $connexionBD->Vignette($id)) != null) {
	$No_colonne = $id % $NB_colonne;
	if($No_colonne==0)	echo "\n\t", '<tr>';					// nouvelle ligne
	//					lien									nom + image	fin de cellule
	echo "\n\t\t", '<td><a href="index.php?support=', $id, '">', $vignette,'</a></td>';
	if($No_colonne==$NB_colonne-1) echo "\n\t", '</tr>';	// fin de ligne si dernière colonne atteinte
	$id++;
}
$connexionBD->Fermer();
// si en sortie on s'arrete sur une colonne autre que la dernière
if($No_colonne!=$NB_colonne-1) echo "\n\t", '</tr>', "\n";
