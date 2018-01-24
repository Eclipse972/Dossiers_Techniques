<?php
class Traceur {
	var $rapport;
	
function Traceur() { // constructeur
	$this->rapport = null; // rapport vide
}

function message($message) { // ajout d'un message dans le rapport
	$this->rapport[] = $message;
}

function lieu($fonction) { // pour affihcer la fonction dans laquelle est lancée le traceur
	$this->message('Lieu : '.$fonction.' ----------------------');
}

function afficher_variable($nom, $valeur) {
	$this->message('variable '.$nom.' = '.$valeur);
}

function afficher_rapport() {
	echo '<!-- '; // début du bloc de commentaire
	if (isset($this->rapport)) {
		echo '--------------------- RAPPORT DU ', date("d/m/Y \à H:i:s"),"--------------------- \n";
		foreach($this->rapport as $ligne) { echo $ligne, "\n"; }
	} else echo "--------------------- RAPPORT VIDE ---------------------";
	echo ' -->',"\n";
}
}

