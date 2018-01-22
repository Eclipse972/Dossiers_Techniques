<?php
class Traceur {
	var $rapport;
	var $fin;
	
function Traceur() { // constructeur
	$this->rapport[1] = 'Rapport du ';
	$this->fin = '- Fin du rapport -';
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

function termine() {
	$this->message($this->fin); // fin du rapport
}

function rapport_vide() {
	returrn (isset($this->rapport[2])); // le rappport est non vide s'il existe une seconde
}

function afficher_rapport() {
	echo "/n/*/n"; // début du bloc de commentaire
	
	foreach($this->rapport as $ligne) {
		echo $ligne, "/n";
	}
	echo "/n- Fin du rapport -*//n"; // fin du bloc de commentaire
}
}

