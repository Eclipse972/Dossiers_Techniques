<header>		<p>Liste des dossiers techniques</p>	</header>

<section>
	<h1>Cliquez sur l&apos;image ou le nom du support pour ouvrir son dossier technique</h1>
	<table>
	<?php
	$_SESSION[SUPPORT] = null; // on détruit le support en cours
	
	GererCache('Vue/sommaire', 'Vue/listeDsupports');
	
	/*
	$cache = 'Vue/listeDsupports.cache';
	if(file_exists($cache) && time()-filemtime($cache) < 3600)	// le cache existe et son âge est inférieur à ... secondes
		readfile($cache);
	else {
		// connection à la base de données
		//include 'connexion.php';
		
		// requete pour sélectionner tous les supports. le résultat est mis dans un tableau
		
		// fermeture de la base de données
		//mysql_close($sql["connect"]);
		
		$No_colonne = -1;
		$NB_colonne = 4;
		ob_start(); // ouverture du tampon
		// construire le tableau pour l'affichage
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
		echo '<!-- cache généré le ', date("d/m/Y \à H:i:s"),' -->', "\n";
		$page = ob_get_contents(); // copie du contenu du tampon dans une chaîne
		ob_end_clean(); // effacement du contenu du tampon et arrêt de son fonctionnement

		// file_put_contents($cache, $page) ; // on écrit la chaîne précédemment récupérée ($page) dans un fichier ($cache)
		// mais cette fonction n'existe en php4 donc cette unique instruction est remplacée par les 4 lignes qui suivent.
		if($fp = fopen($cache,'w')) {	// voir le manuel pour le paramètre w 
			$ok = fwrite($fp,$page);
			fclose($fp);
		}
		
		echo $page ; // affichage de la page
	}*/
	?>
	</table>
</section>
