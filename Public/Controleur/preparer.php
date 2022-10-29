<?php // page d'un dossier technique en construction'
$this->setTitle("Les dossiers techniques de ChristopHe");
$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe</p>");
$this->setLogo("logo.png");
$this->setFooter(" - <a href=/Contact>Me contacter</a>");
$this->setView("page.html");

ob_start();	// début du code <section>
?>
	<h1>Pr&eacute;paer les fichiers</h1>
	<p>Cette phase consiste &agrave; cr&eacute;er tous les fichiers n&eacute;cessaire au site</p>
	<p>Vous aurez besoin de:</p>
	<ul>
		<li>SolidWorks</li>
		<li>eDrawing</li>
		<li>GIMP ou un autre logiciel de retouche d'images</li>
	</ul>
<?php
$this->setSection(ob_get_contents());
ob_end_clean();
