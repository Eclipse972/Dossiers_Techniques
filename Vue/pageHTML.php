<div id="logo"><?php $_SESSION[SUPPORT]->Image(); ?></div>

<header><?php $_SESSION[SUPPORT]->Titre(); ?></header>

<nav>
<?php $_SESSION[SUPPORT]->Afficher_menu(); ?>
</nav>

<section>
<?php
$script = $_SESSION[SUPPORT]->menu->T_page[$_SESSION[ID_PAGE]]; // le test pour savoir si le script existe est déjà fait dans index.php

require 'Vue/fonctions.php'; // fonctions diverses pour l'affichage
switch($script) { // on regarde si script est un mot réservé
case 'eclate':
	$_SESSION[SUPPORT]->Afficher_eclate();
	break;
case 'dessin_densemble':
	$_SESSION[SUPPORT]->Afficher_dessin_densemble();
	break;
case 'nomenclature':
	include 'Vue/nomenclature.php';
	break;
default: $_SESSION[SUPPORT]->Execute($script); // ce n'est pas un mot réservé
}
?>
</section>
