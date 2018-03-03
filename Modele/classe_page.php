<?php
class Page {
function Page(){ // constructeur
	
}
function Afficher($script) {
	switch($script) { // on regarde si script est un mot réservé
	case 'eclate':
		$page = new Eclate($_SESSION[DOSSIER], $_SESSION[PTI_NOM], $_SESSION[PTI_NOM]);
		$page->Afficher();
		break;
	case 'dessin_densemble':
		$page = new Dessin_densemble($_SESSION[DOSSIER], $_SESSION[PTI_NOM], $_SESSION[PTI_NOM]);
		$page->Afficher();
		break;
	case 'nomenclature':
		include 'Vue/nomenclature.php';
		break;
	default:	// ce n'est pas un mot réservé alors on exécute le script s'il existe
		if (file_exists($_SESSION[DOSSIER].$script.'.php'))
			include $_SESSION[DOSSIER].$script.'.php';
		else include 'Vue/en_construction.php';
	}
}
}
