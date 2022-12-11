<?php // à propos de la pince de marquage
$this->setZip("Pince2marquage");

// description de l'archive
ob_start();
?>
	<ul>
		<li>les rouleaux ne roulent pas correctement sur la came</li>
		<li>dessin d'&apos;ensemble absent</li>
	</ul>
<?php
$this->setDescriptionZip(ob_get_clean());
