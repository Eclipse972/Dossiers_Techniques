<?php
class Page {
function Page(){ // constructeur
	
}
function Afficher($script) {
	switch($script) { // on regarde si script est un mot réservé
	case 'eclate':
		$page = new Eclate($_SESSION[SUPPORT]->dossier, $_SESSION[SUPPORT]->pti_nom, $_SESSION[SUPPORT]->pti_nom);
		$page->Afficher();
		break;
	case 'dessin_densemble':
		$page = new Dessin_densemble($_SESSION[SUPPORT]->dossier, $_SESSION[SUPPORT]->pti_nom, $_SESSION[SUPPORT]->pti_nom);
		$page->Afficher();
		break;
	case 'nomenclature':
		include 'Vue/nomenclature.php';
		break;
	default:	// ce n'est pas un mot réservé alors on exécute le script s'il existe
		if (file_exists($_SESSION[SUPPORT]->dossier.$script.'.php'))
			include $_SESSION[SUPPORT]->dossier.$script.'.php';
		else include 'Vue/en_construction.php';
	}
}
}
