<?php
class Fichier {
private $fichier;

public __construct($fichier, $dossier, $substitution = '#') {
	$this->fichier = (file_exists($dossier.$fichier)) ? $dossier.$fichier : $substitution;
}

public Lien($texte) {
	return '<a href="'.$this->fichier.'">'.$texte.'</a>';
}
}

class Image extends Fichier {

public __construct($fichier, $dossier) {
if (!strpos($fichier, '.')) // le fichier n'a pas d'extension
	$fichier .= '.png';	// alors c'est un png
parent::__construct($fichier, $dossier, 'Vue/pas2photo.png');
}

public function Balise($alt, $supplement = '') {
	return '<img src="'.$this->fichier.' '.$supplement.' alt="'.$alt.'">';
}

public Page_image($titre, $texte, $alt, $dessus, $hauteur) {
$code = '<div id="page_image">'."\n".'<h1>'.$titre.'</h1>'."\n";
$texte = ($texte != '') ? '<p>'.$texte.'</p>'."\n" : '';
/* Remarques
	mettre plusieurs paragraphes comme ceci: parag1</p><p>parag2</p><p>parag3
	mettre du code html: </p>code html<p>. les balises qui entourent le code vont créé 2 paragraphes vides
*/
$code .= (!$dessus) ? $texte : '';
$hauteur = ($hauteur == '') ? 400 : $hauteur;
$code .= $this->Balise($alt, 'class="association" style=height:'.$hauteur.'px;');
$code .= ($dessus) ? $texte : '';
return $code.'</div>',"\n";
}
}
