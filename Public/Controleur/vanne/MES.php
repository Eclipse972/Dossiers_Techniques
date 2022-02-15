<?php // MES de la vanne Legris
ob_start();	// début du code <section>
?>
	<h1>Mise en situation</h1>
	<p>Cette vanne autorise ou non le passage d&apos;un fluide de A vers B (voir dessin d&apos;ensemble). Il suffit d&apos;agir sur la manette 8 de 1/4 de tour pour ouvrir ou fermer le passage du fluide.</p>
	<p>Domaines d&apos;utilisation: air comprim&eacute;, huile, gaz, eau chaude, eau froide, eau de mer, fuel, d&eacute;tergent.</p>
	<p>Exemple d&apos;utilisation &agrave; l"atelier de maintenance : ouvrir ou fermer le circuit d&apos;air comprim&eacute;
	</p>
	<img src="/Supports/vanne/images/mes.png" height=px class=association alt="Mise en situation">
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
