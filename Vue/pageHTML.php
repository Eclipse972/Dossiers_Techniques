<div id="corps">
<nav>
<?php	echo $_SESSION->Generer_menu();	?>
</nav>

<section>
<?php
	$T_instruction = $_SESSION->Parametres_script(); // tableau dans lequel sont stockés les paramètres
	include $_SESSION->Script();
?>
</section>
</div>
