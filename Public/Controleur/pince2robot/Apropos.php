<?php // à propos de la pince de robot
$this->setZip("Pince2robot");

// description de l'archive
ob_start();
?>
	<ul>
		<li>par défaut le corps est cach&eacute;</li>
		<li>rajout d&apos;une contrainte limite</li>
	</ul>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setDescriptionZip($tampon);
