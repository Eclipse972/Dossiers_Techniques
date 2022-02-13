<?php	// Test linéarisation du code de validation
global $BD;

$this->setTitle("Les dossiers techniques de ChristopHe");
$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
$this->setLogo("logo.png");
$this->setFooter(" - <a href=/Contact>Me contacter</a>");
$this->setView("bacAsable.html");
$this->setCSS([]);

$validateur1 = new PEUNC\CodeValidation();
$tableau1 =  $validateur1->AfficherTableau();

$nombre =  $validateur1->Encoder();

$validateur2 = new PEUNC\CodeValidation($nombre);
$tableau2 =  $validateur2->AfficherTableau();

$this->setSection("\t<h1>Linéarisation du code de validation</h1>\n\t<p>" . $tableau1 . " -> " . $nombre . " -> " . $tableau2
					. " : " .	($tableau1 == $tableau2 ? "OK" : "Erreur") . "</p>\n");


