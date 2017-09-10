<?php
function GererCache($script, $cache, $delai = 2) {
	// $script sans l'extension .php amis avec le chemin d'accès
	// $cache doit contenir le chemin d'accès sans l'extension. Par exemple  'Vue/listeDsupports(.cache)';
	// délai en heures
	$cache .= '.cache';
	if(file_exists($cache) && time()-filemtime($cache) < $delai*3600)
		readfile($cache);
	else {
		ob_start(); // ouverture du tampon
		include $script.'.php';
		echo '<!-- cache généré le ', date("d/m/Y \à H:i:s"),' -->', "\n";
		$page = ob_get_contents(); // copie du contenu du tampon dans une chaîne
		ob_end_clean(); // effacement du contenu du tampon et arrêt de son fonctionnement

		if($fp = fopen($cache,'w')) {	// voir le manuel pour le paramètre w 
			$ok = fwrite($fp,$page);
			fclose($fp);
		}
		echo $page; // affichage de la page
	}
}
