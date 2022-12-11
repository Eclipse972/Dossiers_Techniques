<?php // à propos de la butée 5 axes
$this->setZip("Butee5axes");

// description de l'archive
ob_start();
?>
	<ul>
		<li>chaque axe fait l&apos;objet d&apos;une configuration dans le fichier But&eacute;e</li>
		<li>&eacute;clat&eacute; sur un fichier séparé</li>
		<li>contient les dessins de d&eacute;finition</li>
	</ul>
<?php
$this->setDescriptionZip(ob_get_clean());
