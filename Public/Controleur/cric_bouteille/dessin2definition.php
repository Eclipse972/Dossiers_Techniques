<?php // dessins de définition du cric bouteille
ob_start();	// début du code <section>
?>
	<h1>Dessins de d&eacute;finition</h1>
	<p>Les dessins de d&eacute;finition de certaines pi&egrave;ces du cric sont disponibles. La liste est affich&eacute;e dans le menu.</p>
<?php
$this->setSection(ob_get_contents());
ob_end_clean();
