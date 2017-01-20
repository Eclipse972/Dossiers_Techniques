<?php
	$param_menu			= Extraire_paramètre('menu');
	$param_sous_menu	= Extraire_paramètre('ss_menu');	// extraction du paramètres sous-menu
	
	if(!isset($_SESSION[SUPPORT]->menu[$param_menu]))	// si le paramètre menu transmis n'est pas dans la liste
		$param_menu = 'MES';										// alors "mise en situation" deviens le menu par défaut.
	
	if(isset($_SESSION[SUPPORT]->association[$param_menu])) { // si param_menu = l'index d'une association
		$STYLE = 'association_image_fichier';							
		$association = $_SESSION[SUPPORT]->association[$param_menu];
		$CONTENU = $association->Page();								// le contenu est le code de la page
	} 
	elseif($param_menu == 'nomenclature') {
		$STYLE = 'nomenclature';
		ob_start();
		include 'Vue/nomenclature.php';	//génère le tableau pour afficher la nomenclature
		$CONTENU = ob_get_clean();
	}
	else {	// on se retrouve avec des page écrites à la main
		$STYLE = 'autre';
		// il faut tester l'existence de la page et traiter l'erreur le cas échéant
		if(isset($_SESSION[SUPPORT]->sous_menu[$param_menu][$param_sous_menu]))
				$page = $param_sous_menu;
		else	$page = $param_menu;
		
		$page =  $_SESSION[SUPPORT]->dossier.$page.'.php';
		if(file_exists($page)) {
			ob_start();
			include $page;	// il faut tester l'existence de cette page
			$CONTENU = ob_get_clean();
		} else $CONTENU = 'Page introuvable';
	}
