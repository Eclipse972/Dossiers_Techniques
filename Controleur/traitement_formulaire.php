<?php
require "../Modele/classe_formulaire.php";
session_start();
	
$suite = $_SESSION['formulaire']->Traitement();
header('Location: http://dossiers.techniques.free.fr/'.$suite);
exit;
