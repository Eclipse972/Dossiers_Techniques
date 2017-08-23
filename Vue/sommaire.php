<?php	// construit le tableau pour l'affichage
$No_colonne = -1;
$NB_colonne = 4;
for($id=0; $id<NB_SUPPORT; $id++) {
	$No_colonne++;
	$No_colonne = $No_colonne % $NB_colonne;
	if($No_colonne==0)	echo "\n\t", '<tr>';					// nouvelle ligne
	echo "\n\t\t", '<td><a href="index.php?support=', $id, '">';// lien
	$support = Selectionne_support($id);
	echo $support->Image(); // image
	echo $support->nom;		// nom du support
	echo '</a></td>';		// fin de cellule
	if($No_colonne==$NB_colonne-1) echo "\n\t", '</tr>';	// fin de ligne si dernière colonne atteinte
}
// si en sortie on s'arrete sur une colonne autre que la dernière
if($No_colonne!=$NB_colonne-1) echo "\n\t", '</tr>', "\n";
