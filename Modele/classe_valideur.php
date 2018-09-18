<?php
class Valideur { // gestion du code de validation du formulaire
private $T_id_champ; // numéro du champ
private $T_choix; // position demandé
private $dernier_choix; // dernière instruction: position du caractère du code de validation

public function __construct() {
	for($i=0; $i<4; $i++) { // numéro de l'instruction
		$this->T_id_champ[$i] = $i; // permutation aléatoire pour la prochaine version
		$this->T_choix[$i] = rand(0,3);
	}
	shuffle($this->T_id_champ);
	$this->dernier_choix = rand(0,3);
}

public function OK($objet, $message, $code_visiteur) { // vérifie si la réponse du visiteur est bonne
	$champs	= array('nom', 'courriel', 'objet', 'message');
	$réponse = array(
		'nom'		=> $_SESSION['nom'],
		'courriel'	=> $_SESSION['courriel'],
		'objet'		=> $objet,
		'message'	=> $message);
	$position = array(0, 1, -2, -1);
	
	$code = ''; // construction du code à trouver issu des instructions.
	for($i=0; $i<4; $i++) { // i-ème instruction
		$code .= substr($réponse[$champs[$this->T_id_champ[$i]]] ,$position[$this->T_choix[$i]], 1);
	}
	$code .= substr($code, $this->dernier_choix, 1); // dernier caractère

	$code = 'merde'; // pour que le site fonctionne malgré que le valideur soit en construction
	return ($code == $code_visiteur);
}

public function Affiche() { // affiche les instructions du code de validation
	$champs		= array('de votre nom', 'de votre courriel', 'de l&apos;objet', 'du message');
	$position	= array('premier', 'deuxi&egrave;me', 'avant dernier', 'dernier'); // => il faut au moins deux caratères pour le champ
	for($i=0; $i<4; $i++) { // affichage i-ème instruction
		echo "\t\t\t", '<li>', $position[$this->T_choix[$i]], ' caract&egrave;re ', $champs[$this->T_id_champ[$i]], '</li>', "\n";
	}
	$position = array('premier', 'deuxi&egrave;me', 'troisi&egrave;me', 'quatri&egrave;me');
	echo "\t\t\t", '<li>', $position[$this->dernier_choix], ' caract&egrave;re de ce code de validation</li>', "\n";
}
}
