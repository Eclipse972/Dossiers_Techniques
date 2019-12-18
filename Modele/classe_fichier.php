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

class Association_image_fichier {
// contient le chemin complet pour accéder ...
	protected $image;	// à l'image
	protected $fichier;	// au fichier

	public function __construct($dossier, $image, $fichier) {
		// les noms de l'image et du fichier contiennent leur extension mais n'ont pas forcément des noms identiques
		$image = new Image($image, $dossier.'images/');
		$fichier = new Fichier($fichier, $dossier.'fichiers/');
		if (!$image->Existe() && !$fichier->Existe())
			trigger_error('L&apos;association image-fichier est vide', E_USER_WARNING);
		$this->image = $image->Chemin();
		$this->fichier = $fichier->Chemin();
	}

	public function Associer($alt, $supplement = '') {	// renvoi le code d'une image liée avec son fichier
		return '<a href="'.$this->fichier.'"><img src="'.$this->image.'" '.$supplement.' alt = "'.$alt.'"></a>';
	}
}

