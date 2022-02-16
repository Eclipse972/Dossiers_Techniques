<?php // vérification du code de validation et JSON
require"PEUNC/BacAsable/commun.php";
// création des champ de formulaire au hasard
$nom = chr(96+rand(1,26)) . chr(96+rand(1,26));

$code ="<p>Nom: {$nom}</p>\n";

$this->setSection("\t<h1>vérification du code de validation et JSON</h1>" . $code . "\n");
