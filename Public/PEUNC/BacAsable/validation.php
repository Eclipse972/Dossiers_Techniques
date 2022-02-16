<?php // code de validation et JSON
require"PEUNC/BacAsable/commun.php";
$CodeValidation = new PEUNC\CodeValidation;

$code = "<p>JSON = " . $CodeValidation->AfficherConfiguration() . "</p>";
$this->setSection("\t<h1>code de validation et JSON</h1>" . $code . "\n");
