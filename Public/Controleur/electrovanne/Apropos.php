<?php // à propos de l'électrovanne
$this->setZip("Electrovanne");

// description
ob_start();
?>
	<ul>
		<li>une des configurations est un &eacute;corch&eacute;</li>
		<li>maquette fixe</li>
		<li>contient les dessins de d&eacute;finition</li>
	</ul>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setDescriptionZip($tampon);

// lien
$this->setLien("source : J&eacute;r&ocirc;me Laparre", "http://laparrej.free.fr/pro_sw.htm#e");
