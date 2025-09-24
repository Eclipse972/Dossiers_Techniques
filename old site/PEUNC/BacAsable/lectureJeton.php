<?php // Lecture du jeton
require"PEUNC/BacAsable/commun.php";

$formulaire = new PEUNC\Contact(-2, 0, 0, "GET");	// actuel formulaire de contact
$jetonXSRF = $formulaire->InsérerJeton();

$code = "<p>Jeton XSRF= {$jetonXSRF}</p>\n";

$O_jeton = $formulaire->LireJeton($jetonXSRF);

$code .= empty($O_jeton) ? "<p>Échec lecture</p>" : "<p>Jeton= {$O_jeton->ID} - {$O_jeton->depart} - {$O_jeton->URLretour}</p>";

$this->setSection("\t<h1>Lecture du jeton XSRF</h1>" . $code . "\n");
