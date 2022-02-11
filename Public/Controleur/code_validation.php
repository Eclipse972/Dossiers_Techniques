<?php	// Linéarisation du code de validation
global $BD;

$this->setTitle("Les dossiers techniques de ChristopHe");
$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
$this->setLogo("logo.png");
$this->setFooter(" - <a href=/Contact>Me contacter</a>");
$this->setView("bacAsable.html");
$this->setCSS([]);

// Fonctions ===============================================================================
function Encodage(array $T1, array $T2, $dernier_choix)
{
	$base = 4;
	$nombre = 0;

	for($i=0; $i<4; $i++)	$nombre = $nombre * $base + $T1[$i];// 1er tableau
	for($i=0; $i<4; $i++)	$nombre = $nombre * $base + $T2[$i];// 2e tableau
	$nombre = $nombre * $base + $dernier_choix;					// dernier choix
	return $nombre;
}

function Decodage($nombre)
{
	// l'ordre est inversé
	$base = 4;
	$dernier_choix2 = $nombre % $base;

	$chiffre = $dernier_choix2;
	for($i=3; $i>=0; $i--)
	{
		$nombre = ($nombre - $chiffre) / $base;
		$chiffre = $nombre % $base;
		$T_choix2[$i] = $chiffre;
	}
	for($i=3; $i>=0; $i--)
	{
		$nombre = ($nombre - $chiffre) / $base;
		$chiffre = $nombre % $base;
		$T_id_champ2[$i] = $chiffre;
	}
	return array($T_id_champ2,$T_choix2, $dernier_choix2);
}
// Génération des tableaux =================================================================

for($i=0; $i<4; $i++)
{	// i-ème instruction
	$T_id_champ[$i] = $i;		// numéro du champ
	$T_choix[$i] = rand(0,3);	// choix du caractère
}
shuffle($T_id_champ);		// on mélange l'ordre des champs
$dernier_choix = rand(0,3);	// choix du dernier caractère


// Affichage des valeurs ===================================================================

$code = "<p>(";
for($i=0; $i<4; $i++)	$code .= $T_id_champ[$i] . " ";
for($i=0; $i<4; $i++)	$code .= $T_choix[$i] . " ";
$code .= $dernier_choix . ") -> ";

// Affichage du nombre ======================================================================
$nombre = Encodage($T_id_champ, $T_choix, $dernier_choix);
$code .= "nombre = {$nombre} -> (";

// Décodage ================================================================================
list($T_id_champ2, $T_choix2, $dernier_choix2) = Decodage($nombre);
for($i=0; $i<4; $i++)	$code .= $T_id_champ2[$i] . " ";
for($i=0; $i<4; $i++)	$code .= $T_choix2[$i] . " ";
$code .= $dernier_choix2 . "): ";
if(		(count(array_diff($T_id_champ, $T_id_champ2)) == 0)
	&&	(count(array_diff($T_choix, $T_choix2)) == 0)
	&&	($dernier_choix == $dernier_choix2)
)
{
	$code .= "OK";
}
else $code .= "Erreur";
$code .= "</p>\n";

$this->setSection("\t<h1>Linéarisation du code de validation</h1>\n\t" . $code . "\n");


