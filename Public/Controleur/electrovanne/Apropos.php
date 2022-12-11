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
$this->setDescriptionZip(ob_get_clean());

// lien
$this->setLien("source : J&eacute;r&ocirc;me Laparre", "http://laparrej.free.fr/pro_sw.htm#e");
