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
$this->setDescriptionZip(ob_get_clean());
