<?php	// page daccueil
global $BD;

$this->setTitle("Les dossiers techniques de ChristopHe");
$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
$this->setLogo("logo.png");
$this->setFooter(" - <a href=/Contact>Me contacter</a>");
$this->setView("bacAsable.html");
$this->setCSS([]);

$Liste = $BD->ResultatSQL("SELECT code FROM Vue_code_item
							WHERE alpha = -3 AND beta > 0 AND gamma =0",
							[]
						);
if ($Liste == null)
	$code = "<p>Rien pour le moment !</p>";
elseif (is_array($Liste))
{
	$code = "<p>Liste des tests en cours:</p>\n\t<ul>\n";
	foreach ($Liste as $valeur)
		$code .= "\t\t<li>{$valeur["code"]}</li>\n";
	$code .= "\t</ul>";
}
else $code = "<p>un seul test: {$Liste}</p>";

$this->setSection("\t<h1>Le bac &agrave; sable</h1>\n\t" . $code . "\n");
