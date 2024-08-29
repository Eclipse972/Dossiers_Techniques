<?php // à propos du cric bouteille
$this->setZip("cric_bouteille");

// description
ob_start();
?>
	<ul>
		<li>le fichier s&apos;apelle Assemblage2</li>
		<li>la maquette est mobile</li>
		<li>pas de simulation des clapets</li>
	</ul>
<?php
$this->setDescriptionZip(ob_get_clean());
