<?php // apprendre à créer et utilise un fichier JSON
require"PEUNC/BacAsable/commun.php";

$fichier = '{"ID":125, "depart":' . time() . '}';
$objet = json_decode($fichier);

$code = "<p>fichier :" .$fichier . "</p><p>Utilisation</p><p>ID = " . $objet->ID . "<br>temps " .  $objet->depart . "</p>";

$this->setSection("\t<h1>Utilisation fichier JSON</h1>" . $code . "\n");

// ajouter des info
// idée: rajouter une objet entouré d'accolades puis supprimer la séquence }{ pour concaténer les deux objets
