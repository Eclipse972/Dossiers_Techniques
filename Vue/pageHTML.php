<?php
if ($_BD->Page_existe($_SESSION[ID], $_ITEM, $_SOUS_ITEM)) {
	$_SESSION[ITEM]		 = $_ITEM; // on stocke dans la session
	$_SESSION[SOUS_ITEM] = $_SOUS_ITEM;
} else{ 
	$_SESSION[ITEM]		 = 1; // on utilise la page mise en situation
	$_SESSION[SOUS_ITEM] = 0;
}
?>
<div id="corps">
<nav>
<?php // le code html sera à inclure dans le script si cela pose problème avec l'implémentation du cache
	$menu = new Menu($_SESSION[ID], $_SESSION[ITEM], $_SESSION[SOUS_ITEM]); // créationdu menu
	$menu->Afficher_menu();
?>
</nav>

<section>
<?php
	$T_instruction = $_BD->Script($_SESSION[ID], $_SESSION[ITEM], $_SESSION[SOUS_ITEM]);
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
