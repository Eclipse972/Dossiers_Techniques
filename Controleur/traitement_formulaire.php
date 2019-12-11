<?php
require "../Modele/classe_formulaire.php";
session_start();
// ce script est exécuté independament de index.php donc il faut inclure les classes utiles
//include "liens.php";
//include "../Modele/classe_support.php";

$_SESSION['formulaire']->Récupérer_données();

$parametre = "index.php";
header("Location: http://dossiers.techniques.free.fr/".$parametre);
exit;
