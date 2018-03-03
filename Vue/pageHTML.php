<header>
	<?php	echo $_SESSION[IMAGE], $_SESSION[TITRE], "\n";	?>
</header>

<div id="corps">

<Nav>
<?php
	$menu = new Menu($_SESSION[ID], $_SESSION[ITEM], $_SESSION[SOUS_ITEM]);
	$menu->Afficher_menu();
?>
</nav>

<section>
<?php
$page = new Page;
$connexionBD = new base2donnees;
$script = $connexionBD->Script($_SESSION[ID], $_SESSION[ITEM], $_SESSION[SOUS_ITEM]);
$connexionBD->Fermer();
$page->Afficher($script);
?>
</section>

</div>
