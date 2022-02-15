<?php // à propos du casse-noix
$this->setZip("CasseNoix");

// description de l'archive
ob_start();
?>
	<ul>
		<li>maquette bloqu&eacute;e</li>
		<li>dessins de d&eacute;finition</li>
	</ul>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setDescriptionZip($tampon);
