<?php	// Test linéarisation du code de validation
global $BD;
require"PEUNC/BacAsable/commun.php";

$validateur1 = new PEUNC\CodeValidation();
$tableau1 =  $validateur1->AfficherTableau();

$nombre =  $validateur1->Encoder();

$validateur2 = new PEUNC\CodeValidation($nombre);
$tableau2 =  $validateur2->AfficherTableau();

$this->setSection("\t<h1>Linéarisation du code de validation</h1>\n\t<p>" . $tableau1 . " -> " . $nombre . " -> " . $tableau2
					. " : " .	($tableau1 == $tableau2 ? "OK" : "Erreur") . "</p>\n");


