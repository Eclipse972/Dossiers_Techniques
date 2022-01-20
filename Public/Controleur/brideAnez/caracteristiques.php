<?php // caractéristiques de la bride à nez
ob_start();	// début du code <section>
?>
	<h1>Caractéristiques</h1>
	<h2>Bride hydraulique</h2>
	<p>Diamètre de la chambre : 40 mm</p>
	<p>Course du piston : 31,6 mm</p>
	<p>Pression maximum d’utilisation : 25 MPa</p>
	<p>Temps de manoeuvre : 1 seconde</p>
	<p>Epaisseur minimum à serrer : 6,75 mm</p>
	<p>Epaisseur maximum à serrer : 15.75 mm</p>
	<h2>Pompe Hydraulique</h2>
	<p>Pression maximale de la pompe = 25 Mpa</p>
	<p>Débit Qv de la pompe = 2.4 l/min</p>
	<p>Puissance de la pompe = 1000 W</p>
	<h2>Régulateur de pression</h2><p></p>
	<p>Pression de service : 7 MPa</p>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
