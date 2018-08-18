<?php // la session contient l'objet support
$_SESSION->setPosition($_ITEM, $_SOUS_ITEM);
$cache = 'Vue/cache/'.$_SESSION->Pti_nom().' '.$_SESSION->ID().'-'.$_SESSION->Item().'-'.$_SESSION->Sous_item().'.cache';
$vie = 2; // durée de vie en heure

if(file_exists($cache) && time()-filemtime($cache) < $vie * 3600)
	readfile($cache);// le cache est lu s'il existe et qu'il n'est pas trop vieux
else {
	ob_start(); // ouverture du tampon
?>
<div id="corps">
<nav>
<?php	echo $_SESSION->Generer_menu();	?>
</nav>

<section>
<?php
	$T_instruction = $_BD->Parametres_script($_SESSION->ID(), $_SESSION->Item(), $_SESSION->Sous_item()); // tableau dans lequel est stocké le script avec ses paramètres
	include $_SESSION->Script($erreur);
?>
</section>
</div>
<?php
	$page = ob_get_contents(); // copie du contenu du tampon
	ob_end_clean(); // effacement du contenu du tampon et arrêt 
	$page .= '<!-- Cache créé le '.date('j/n/Y à G:i').' -->'."\n";
	file_put_contents($cache, $page) ; // on écrit la page comme fichier cache
	echo $page ; // on affiche notre page qu'il y ai une erreur ou pas
} // else
