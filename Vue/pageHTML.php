<header>
	<?php
		$_SESSION[SUPPORT]->Image();	//logo
		echo '<p>Dossier technique ', $_SESSION[SUPPORT]->du, $_SESSION[SUPPORT]->nom, '</p>', "\n"; 
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
$page = new Page;
$connexionBD = new base2donnees;
$script = $connexionBD->Script($_SESSION[SUPPORT]->id,$_SESSION[SUPPORT]->item,$_SESSION[SUPPORT]->sous_item);
$connexionBD->Fermer();
$page->Afficher($script);
?>
</section>

</div>
