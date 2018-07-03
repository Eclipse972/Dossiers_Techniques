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
$T_instruction = $connexionBD->Script($_SESSION[ID], $_SESSION[ITEM], $_SESSION[SOUS_ITEM]);
$script = $T_instruction['script'].'.php';
if (file_exists($_SESSION[DOSSIER].$script)) // si le script dans le dossier du support existe
	include $_SESSION[DOSSIER].$script;
elseif (file_exists('Vue/'.$script)) // sinon c'est un mot clé
	include('Vue/'.$script);
else
	include 'Vue/en_construction.php'; // si le script n'existe nulle part ...
?>
</section>

</div>
