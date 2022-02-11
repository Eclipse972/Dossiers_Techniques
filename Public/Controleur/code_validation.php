<?php	// Linéarisation du code de validation
global $BD;

$this->setTitle("Les dossiers techniques de ChristopHe");
$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
$this->setLogo("logo.png");
$this->setFooter(" - <a href=/Contact>Me contacter</a>");
$this->setView("bacAsable.html");
$this->setCSS([]);

// Génération des tableaux =================================================================

for($i=0; $i<4; $i++)
{	// i-ème instruction
	$T_id_champ[$i] = $i;		// numéro du champ
	$T_choix[$i] = rand(0,3);	// choix du caractère
}
shuffle($T_id_champ);		// on mélange l'ordre des champs
$dernier_choix = rand(0,3);	// choix du dernier caractère


// Affichage des valeurs ===================================================================

$code = "";

for($i=0; $i<4; $i++)	$code .= $T_id_champ[$i] . " - ";
for($i=0; $i<4; $i++)	$code .= $T_choix[$i] . " - ";
$code .= $dernier_choix . "\n";

// Encodage ================================================================================
$base = 10;
$nombre = 0;

for($i=0; $i<4; $i++)	$nombre = $nombre * $base + $T_id_champ[$i];	// 1er tableau
for($i=0; $i<4; $i++)	$nombre = $nombre * $base + $T_choix[$i];		// 2e tableau
$nombre = $nombre * $base + $dernier_choix;								// dernier choix

// Affichage du nombre
$code .= "<p>nombre = {$nombre}</p>";
$this->setSection("\t<h1>Linéarisation du code de validation</h1>\n\t" . $code . "\n");
