<?php
class Fichier {
protected $fichier;
protected $substitution;

public function __construct($fichier, $dossier) {
$this->substitution = '#';
$this->fichier = (file_exists($dossier.$fichier)) ? $dossier.$fichier : $this->substitution;
}

// assesseurs
public function Chemin() { return $this->fichier; } // renvoi le chemin d'accès complet

public function Lien($texte) { return '<a href="'.$this->fichier.'">'.$texte.'</a>'; }

public function Existe() { return ($this->fichier != $this->substitution); }

public function Extension() { // retourne l'extension du fichier
	// à définir
}
}

class Zip extends Fichier {

public function __construct($fichier, $dossier) {
$fichier .= '.zip';
$dossier .= 'fichiers/';
parent::__construct($fichier, $dossier);
}
}

class Image extends Fichier {

public function __construct($fichier, $dossier) {
$this->substitution = 'Vue/pas2photo.png';
if (!strpos($fichier, '.')) // le fichier n'a pas d'extension
	$fichier .= '.png';	// alors c'est un png
parent::__construct($fichier, $dossier);
}

public function Balise($alt, $supplement = '') { return '<img src="'.$this->fichier.'" '.$supplement.' alt="'.$alt.'">'; }

}
