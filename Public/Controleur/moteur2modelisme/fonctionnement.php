<?php // fonctionnement du moteur de modélisme
ob_start();	// début du code <section>
?>
	<h1>Cycle de fonctionnement d&apos;un moteur thermique 2 temps</h1>
	<div class="colonne">
	<h2>Point mort bas (PMB)</h2>
	<p>le piston est en position basse</p>
	<img src="/Supports/moteur2modelisme/images/PMB.png" alt ="point mort bas">
	</div>

	<div class="colonne">
	<h2>Mont&eacute;e du piston</h2>
	<p>phase de compression</p>
	<img src="/Supports/moteur2modelisme/images/montee.png" alt ="mont&eacute;e du poston">
	</div>

	<div class="colonne">
	<h2>Point mort haut (PMH)</h2>
	<p>explosion du m&eacute;lange air-essence</p>
	<img src="/Supports/moteur2modelisme/images/PMH.png" alt ="point mort haut">
	</div>

	<div class="colonne">
	<h2>Descente du piston</h2>
	<p>phase d&apos;&eacute;chappement</p>
	<img src="/Supports/moteur2modelisme/images/descente.png" alt ="descente du piston">
	</div>
<?php
$this->setSection(ob_get_clean());
