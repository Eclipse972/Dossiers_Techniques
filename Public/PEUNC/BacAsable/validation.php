<?php // code de validation et JSON
require"PEUNC/BacAsable/commun.php";
$CodeValidation = new PEUNC\CodeValidation;

$contenuJSON =  $CodeValidation->getConfiguration();
$code = "<p>JSON = " . $contenuJSON . "</p>\n";

$objetJSON = json_decode($contenuJSON);

$code .= "<p>2e élément 1er tableau = " . $objetJSON->T_id_champ[1] . "</p>\n";
$code .= "<p>3e élément 2e tableau = " . $objetJSON->T_choix[2] . "</p>\n";
$code .= "<p>dernier choix = " . $objetJSON->dernier_choix . "</p>\n";

$this->setSection("\t<h1>code de validation et JSON</h1>" . $code . "\n");
