<?php // fonctionnement du moteur de modélisme
ob_start();	// début du code <section>
?>
	<div id="page_image">
	<h1>D&eacute;sol&eacute; !</h1>
	<p align=center>Il semblerai que je n&apos;ai pas r&eacute;dig&eacute; cette page.</p>
	<img src="/Supports/moteur2modelisme/images/moteur.png"  alt="le moteur de mod&eacute;lisme">	<p align=center>N&apos;h&eacute;sitez pas &agrave; me contacter (lien en bas de page) si le probl&egrave;me persiste.</p>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
