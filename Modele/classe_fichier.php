<?php
class Fichier {
protected $fichier;
protected $substitution;

public function __construct($fichier, $dossier) {
$this->substitution = '#';
$this->fichier = (file_exists($dossier.$fichier)) ? $dossier.$fichier : $this->substitution;
}

public function Chemin() { // renvoi le chemin d'accès complet
	return $this->fichier;
}

public function Lien($texte) {
	return '<a href="'.$this->fichier.'">'.$texte.'</a>';
}

public function Existe() {
	return ($this->fichier != $this->substitution);
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

public function Balise($alt, $supplement = '') {
	return '<img src="'.$this->fichier.'" '.$supplement.' alt="'.$alt.'">';
}

public function Page_image($titre, $texte, $alt, $image_au_dessus, $hauteur) {
$code = '<div id="page_image">'."\n".'<h1>'.$titre.'</h1>'."\n";
$hauteur = ($hauteur == '') ? 400 : $hauteur;
$code .= (!$image_au_dessus) ? $texte : '';
$code .= $this->Balise($alt, 'class="association" style=height:'.$hauteur.'px;');
$code .= ($image_au_dessus) ? $texte : '';
return $code.'</div>'."\n";
}
}
