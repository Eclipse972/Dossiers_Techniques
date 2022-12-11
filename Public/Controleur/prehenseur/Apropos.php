<?php // à propos du préhenseur de culasse
$this->setZip("prehenseur2culasse");

// description de l'archive
ob_start();
?>
	<ul>
		<li>plusieurs fichiers au lieu d&apos;utiliser des configurations</li>
		<li>le fichier pr&eacute;henseur pour &eacute;tude d'ouverture permet de voir le fonctionnement</li>
	</ul>
<?php
$this->setDescriptionZip(ob_get_clean());
