<?php // fonctionnement cric bouteille:  montée
ob_start();	// début du code <section>
?>
	<img src="/Supports/cric_bouteille/images/action_manuelle_descente.png" style="height:400px; float: right;" alt="action pour la descente">
	<h1>Descente</h1>
	<p>La descente de la charge est obtenue par desserrage de la  vis de d&eacute;charge.</p>
	<h1>Du point de vue interne</h1>
	<p>L&apos;huile contenu dans la chambre de v&eacute;rin retourne dans le r&eacute;servoir. La tige de v&eacute;rin descend sous l&apos;action de la charge.</p>
	<img src="/Supports/cric_bouteille/images/decharge.png" class=image_centree style=width:400px alt="Circulation de l&apos;huile">
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
