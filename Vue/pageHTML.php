<div id="corps">
<nav>
<?php	echo $_SESSION['support']->Generer_menu();	?>
</nav>

<section>
<?php
	$T_instruction = $_SESSION['support']->Parametres_script(); // tableau dans lequel sont stockés les paramètres
	include $_SESSION['support']->Script();
?>
</section>
</div>
