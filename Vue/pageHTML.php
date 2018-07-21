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
<?php
$cache = $_SESSION[DOSSIER].'page_'.$_SESSION[ITEM].'-'.$_SESSION[SOUS_ITEM].'.cache';
if(file_exists($cache)) // le cache est conservé jusqu'à suppression manuelle sur le serveur
	readfile($cache);
else {
	ob_start(); // ouverture du tampon
	$menu = new Menu($_SESSION[ID], $_SESSION[ITEM], $_SESSION[SOUS_ITEM]); // création du menu
	$menu->Afficher_menu();
?>
</nav>
<section>
<?php
	$T_instruction = $_BD->Script($_SESSION[ID], $_SESSION[ITEM], $_SESSION[SOUS_ITEM]);
	$script = $T_instruction['script'].'.php';
	$erreur = false;
	if (file_exists($_SESSION[DOSSIER].$script)) // si le script dans le dossier du support existe
		include $_SESSION[DOSSIER].$script;
	elseif (file_exists('Vue/'.$script)) // sinon c'est un mot clé
		include('Vue/'.$script);
	else {
		include 'Vue/oups.php'; // si le script n'existe nulle part ...
		$erreur = true;
	}
	$page = ob_get_contents(); // copie du contenu du tampon
	ob_end_clean(); // effacement du contenu du tampon et arrêt 
	if (!$erreur) {
		$page .= '<!-- Cache créé le '.date('j/n/Y à G:i:s').' -->'."\n";
		file_put_contents($cache, $page) ; // on écrit la page comme fichier cache
	}// si on tombe sur une erreur on ne crée pas de cache
	echo $page ; // on affiche notre page qu'il y ai une erreur ou pas
}
?>
</section>
</div>
