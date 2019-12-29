<?php
class Fichier {
	protected $fichier;

	public function __construct($fichier, $dossier = '', $substitution = '#')
		{ $this->fichier = (file_exists($dossier.$fichier)) ? $dossier.$fichier : $substitution; }
	
	public function Chemin() { return $this->fichier; } // renvoi le chemin d'accès complet

	public function Lien($texte) { return '<a href="'.$this->fichier.'">'.$texte.'</a>'; }

	public function Existe() { return ($this->fichier != '#'); }
}

class Zip extends Fichier {
	public function __construct($archive) { parent::__construct($archive); }
}

class Image extends Fichier {
	public function __construct($fichier, $dossier = '') {
		if (!strpos($fichier, '.')) // le fichier n'a pas d'extension
			$fichier .= '.png';	// alors c'est un png
		parent::__construct($fichier, $dossier, 'Vue/pas2photo.png');
	}
	public function Existe() { return ($this->fichier != 'Vue/pas2photo.png'); }

	public function Balise($alt, $supplement = '')	{ return '<img src="'.$this->fichier.'" '.$supplement.' alt="'.$alt.'">'; }
}
