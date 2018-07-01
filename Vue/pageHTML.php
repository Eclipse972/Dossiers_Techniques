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
$connexionBD = new base2donnees;
$script = $connexionBD->Script($_SESSION[ID], $_SESSION[ITEM], $_SESSION[SOUS_ITEM]);
if (file_exists($_SESSION[DOSSIER].$script.'.php')) // si le script dans le dossier du support existe
	include $_SESSION[DOSSIER].$script.'.php';
elseif (file_exists('Vue/'.$script.'.php')) // sinon c'est un mot clé
	include('Vue/'.$script.'.php');
else
	include 'Vue/en_construction.php'; // si le script n'existe nulle part ...
?>
</section>

</div>
