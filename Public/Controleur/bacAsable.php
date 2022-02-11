<?php	// page daccueil
global $BD;

$this->setTitle("Les dossiers techniques de ChristopHe");
$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
$this->setLogo("logo.png");
$this->setFooter(" - <a href=/Contact>Me contacter</a>");
$this->setView("bacAsable.html");
$this->setCSS([]);

$code = "\t<h1>Le bac &agrave; sable</h1>\n\t<p>Liste des tests en cours:</p>\n\t<ul></ul>\n";
$Liste = $BD->Liste_niveau($this->alpha);
/*foreach ($Liste as $valeur)
	$code .= "\t\t<li>{$valeur}</li>\n";
*/
$this->setSection($code . "</ul>\n");
