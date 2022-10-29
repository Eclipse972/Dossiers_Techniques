<?php // comment créer un dossier technique
$this->setTitle("Les dossiers techniques de ChristopHe");
$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe</p>");
$this->setLogo("logo.png");
$this->setFooter(" - <a href=/Contact>Me contacter</a>");
$this->setView("page.html");
$this->setCSS("index");

ob_start();
?>
	<h1>Participer en cr&eacute;ant des dossiers techniques</h1>
	<p>Cr&eacute;er un dossier technique se fait en deux phases: préparer les fichiers sur votre disque dur puis cr&eacute;er les pages du site.</p>
	<p>Pr&eacute;parer les fichiers</p>
	<ol>
		<li>le dossier technique minimal</li>
		<li>la maquette num&eacute;rique</li>
		<li>les dessins</li>
		<li>nomenclature</li>
		<li>l&apos;archive ZIP</li>
		<li>les images</li>
		<li>les fichiers</li>
	</ol>
	<p>Les pages du site</p>
	<ol>
		<li>l&apos;arborescence</li>
		<li>table Support</li>
		<li>les contr&ocirc;leurs</li>
		<li>mise en situation</li>
		<li>l&apos;association image-fichier</li>
		<li>page image</li>
		<li>o&ugrave; mettre les fichiers</li>
		<li>nomenclature</li>
		<li>Page "&Agrave; propos" du support</li>
		
		<li>page libre</li>
	</ol>
	<a href=/>Retour &agrave; la page d&apos;accueil</a>
<?php
$this->setSection(ob_get_contents());
ob_end_clean();
