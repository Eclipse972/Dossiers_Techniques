<?php // vérification du code de validation et JSON
require"PEUNC/BacAsable/commun.php";
// création des champ de formulaire au hasard
$nom = chr(96+rand(1,26)) . chr(96+rand(1,26));
$objet = chr(96+rand(1,26)) . chr(96+rand(1,26));
$courriel = chr(96+rand(1,26)) . chr(96+rand(1,26)) . "@site." . chr(96+rand(1,26)) . chr(96+rand(1,26));
$message = chr(96+rand(1,26)) . chr(96+rand(1,26)) . "...." . chr(96+rand(1,26)) . chr(96+rand(1,26));

$code ="<p>Nom: {$nom}</p>\n<p>Courriel: {$courriel}</p>\n<p>Objet: {$objet}</p>\n<p>message: {$message}</p>\n";

$CodeValidation = new PEUNC\CodeValidation;
$code .= $CodeValidation->Afficher();
$code .=  "<p>Solution =" . $CodeValidation->Solution($nom, $courriel, $objet, $message) . "</p>";

$this->setSection("\t<h1>vérification du code de validation et JSON</h1>" . $code . "\n");
