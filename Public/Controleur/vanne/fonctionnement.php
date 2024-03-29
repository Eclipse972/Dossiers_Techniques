<?php // fonctionnement de la vanne sphérique
ob_start();	// début du code <section>
?>
	<h1>Fonctionnement</h1>
	<p>L&apos;ouverture et la fermeture se font manuellement.Le passage du fluide ou son blocage est assur&eacute; par une sphère trou&eacute;e. L&apos;utilisateur agit sur la manette qui va entraîner le sphère en rotation.</p>

	<div class="colonne">
	<h2>Vanne ouverte</h2>
	<p>Lorsque la manette est orient&eacute;e parallèlement au tuyau le fluide peut passer.</p>
	<img src="/Supports/vanne/images/vanne_ouverte.png" style="width:300px" class="image_centree" alt="vanne ouverte">
	</div>

	<div class="colonne">
	<h2>Vanne ferm&eacute;e</h2>
	<p>Lorsque la manette est orient&eacute;e perpendiculairement au tuyau le fluide ne peut plus passer.</p>
	<img src="/Supports/vanne/images/vanne_fermee.png" style="width:300px" class="image_centree" alt="vanne ferm&eacute;e">
	</div>
<?php
$this->setSection(ob_get_clean());
