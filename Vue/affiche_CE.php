<?php // affiche les classes d'équivalence A METTRE DANS LA PARTIE VUE
if(isset($_SESSION[CE_BATI])) {
	// on construit la liste des CE en ordonnant les CE
	$liste_CE[] = $_SESSION[CE_ENTREE];
	$liste_CE[] = $_SESSION[CE_SORTIE];
	$liste_CE[] = $_SESSION[CE_BATI];
	$liste_CE[] = $_SESSION[AUTRES_CE];
	echo "<ul>";
	foreach($liste_CE as $CE) 
		echo '<li>', $CE->Affiche(), '</li>'; // $objet_support est un objet défini dans page.php qui inclus ce fichier
	echo "</ul>";
	echo '<p>Cliquez sur une image pour t&eacute;l&eacute;charger l&#145;assemblage au format eDrawing. Vous pourrez basculer entre le mécanisme assemblé et la vue éclatée en cliquant sur l&#145;ic&ocirc;ne <img src="Vue/icone_eclater_rassembler.png" alt="Ic&ocirc;ne &eacute;clater/Rassembler de eDrawing">.</p>';
}