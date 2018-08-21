<div id="corps">
<nav>
<?php	echo $_SESSION->Generer_menu();	?>
</nav>

<section>
<?php
	$T_instruction = $_BD->Parametres_script($_SESSION->ID(), $_SESSION->Item(), $_SESSION->Sous_item()); // tableau dans lequel est stocké le script avec ses paramètres
	include $_SESSION->Script();
?>
</section>
</div>
