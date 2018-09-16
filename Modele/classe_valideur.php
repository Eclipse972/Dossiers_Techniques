<?php
class Valideur { // gestion du code de validation du formulaire
private $T_id_champ; // numéro du champ
private $T_choix; // position demandé
private $dernier_choix; // dernière instruction: position du caractère du code de validation

public function __construct() {
	for($i=0; $i<4; $i++) { // numéro de l'instruction
		$this->T_id_champ[$i] = 3-$i; // permutation aléatoire pour a prochaine version
		$this->T_choix[$i] = rand(0,3);
		$this->dernier_choix = rand(1,4);
	}
}

public function OK($nom, $courriel, $objet, $message) { // vérifie si le code entré est bon
}

public function Affiche() { // affiche les instructions du code de validation
	$champs		= array('de votre nom', 'de votre courriel', 'de l&apos;objet', 'du message');
	$position	= array('premier', 'deuxi&egrave;me', 'avant dernier', 'dernier');
	$position2	= array('premier', 'deuxi&egrave;me', 'troisi&egrave;me', 'quatri&egrave;me');
	for($i=0; $i<4; $i++) { // affichage i-ème instruction
		echo "\t\t\t", '<li>', $position[$this->T_choix[$i]], ' caract&egrave;re ', $champs[$this->T_id_champ[$i]], '</li>', "\n";
	}
	echo "\t\t\t", '<li>', $position2[$this->dernier_choix], ' caract&egrave;re de ce code de validation</li>', "\n";
}
}
