<main role="main"> <!--remarque: <main> suffit à Chrome pour tenir compte de la feuille de style.-->
<nav>
<?php	
	$SUPPORT = unserialize($_SESSION['support']);
	echo $SUPPORT->Generer_menu();
?>
</nav>

<section>
<?php
	$T_instruction = $SUPPORT->Parametres_script(); // tableau dans lequel sont stockés les paramètres
	include $SUPPORT->Script();
?>
</section>
</main>
