<?php // fonctionnement cambreuse
ob_start();	// début du code <section>
?>
	<h1>Caract&eacute;ristiques &eacute;nerg&eacute;tiques</h1>
	<h2>V&eacute;rin pneumatique de bridage :</h2>
	<ul>
	<li>Ø Piston : 80 mm</li>
	<li>Pression d&apos;utilisation : 0,6 N/mm²</li>
	<li>Course du piston : 50 mm</li>
	</ul>
	<h2>V&eacute;rin pneumatique de cambrage :</h2>
	<ul>
	<li>Ø Piston : 63 mm</li>
	<li>Pression d&apos;utilisation : 0,6 N/mm²</li>
	<li>Course du piston : 50 mm</li>
<?php
$this->setSection(ob_get_clean());
