<?php
$this->setTitle("Les dossiers techniques de ChristopHe");
$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe</p>");
$this->setLogo("logo.png");
$this->setFooter(" - <a href=/Contact>Me contacter</a>");
$this->setView("page.html");

ob_start();	// début du code <section>
?>
	<h1>Contruire les pages du site</h1>
	<p>Cette phase consiste &agrave; cr&eacute;er toutes les pages du site</p>
	<p>Vous aurez besoin de:</p>
	<ul>
		<li>Geany ou un &eacute;diteur de scripts</li>
		<li>Filezilla pour envoyer les fichiers sur le serveur</li>
		<li>un navigateur internet pour acc&eacute;der la base de donn&eacute;es et au site lui-m&ecirc;me</li>
	</ul>
<?php
$this->setSection(ob_get_contents());
ob_end_clean();

