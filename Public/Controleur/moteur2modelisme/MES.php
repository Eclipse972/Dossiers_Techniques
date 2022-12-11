<?php // MES du moteur de modélisme
ob_start();	// début du code <section>
?>
<h1>Mise en situation</h1>
<p> Ce moteur est un moteur thermique monocylindre 2 temps, d&apos;environ 6 cm3 de marque OSMAX. Il est utilis&eacute; pour propulser des mod&egrave;les r&eacute;duits d'avions  &agrave; h&eacute;lice, fonctionnant avec un m&eacute;lange de m&eacute;thanol, nytrom&eacute;thane et d&apos;huile de synth&egrave;se ou de ricin.</p>
<div style="display:inline-block; width:800px; vertical-align:top;">
	<h2>Caract&eacute;ristiques techniques</h2>
	<ul>
	<li>Moteur 2 Temps</li>
	<li>Cylindr&eacute;e : 5,90 cm3</li>
	<li>Fr&eacute;quence de rotation: 2500 &agrave; 15000 tours/min</li>
	<li>Poids :	256 grammes</li>
	<li>H&eacute;lice recommand&eacute;e : 10 x 5 ou 10 x 5,5</li>
	<li>Prix : 80 €uros TTC</li>
	<li>Carburant : M&eacute;lange de m&eacute;thanol, nytrom&eacute;thane et d&apos;huile synth&egrave;se ou de ricin</li>
	<li>Allumage : Bougie Glow-Plug port&eacute;e au rouge par une tension de 1,5V lors du d&eacute;marrage</li>
	</ul>
</div>
<div style="display:inline-block; vertical-align:top;">
	<img src="/Supports/moteur2modelisme/images/fonctionnement_moteur.gif" width=300px alt ="animation moteur">
</div>
<?php
$this->setSection(ob_get_clean());
