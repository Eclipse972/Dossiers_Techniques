<header>
	<?php
		$_SESSION[SUPPORT]->Image();
		$_SESSION[SUPPORT]->Titre();
	?>
</header>

<div id="corps">

<Nav>
<?php
	$menu = new Menu($_SESSION[SUPPORT]->id, $_SESSION[SUPPORT]->item, $_SESSION[SUPPORT]->sous_item);
	$menu->Afficher_menu();
?>
</nav>

<section>
<?php
$script = $_SESSION[SUPPORT]->Script(); // le test pour savoir si le script existe est déjà fait dans index.php

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

</div>
