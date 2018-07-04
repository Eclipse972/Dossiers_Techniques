<?php	// construit le tableau pour l'affichage
function Sommaire($NB_colonne) {
$id = 0;
$connexionBD = new base2donnees();
$ListeDvignettes = $connexionBD->ListeDVignettes();
while (isset($ListeDvignettes[$id])) {
	$No_colonne = $id % $NB_colonne;
	if($No_colonne==0)	echo "\n\t", '<tr>'; // nouvelle ligne
	echo "\n\t\t", '<td>', $ListeDvignettes[$id],'</td>';
	if($No_colonne==$NB_colonne-1) echo "\n\t", '</tr>';	// fin de ligne si dernière colonne atteinte
	$id++;
}
// si en sortie on s'arrete sur une colonne autre que la dernière
if($No_colonne!=$NB_colonne-1) echo "\n\t", '</tr>', "\n";
}
Sommaire(6); // tableau avec 6 colonnes
