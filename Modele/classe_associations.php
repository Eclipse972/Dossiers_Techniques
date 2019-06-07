<?php
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

public function Associer($alt, $supplement = '') {	// renvoi le code d'une image liée au fichier
	return '<a href="'.$this->fichier.'"><img src="'.$this->image.'" '.$supplement.' alt = "'.$altm.'"></a>';
}

public function Code($commentaire = null) { // affiche une page avec un tite l'image cliquable avec en dessous un commentaire
$code = '<p style="text-align:center">Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>'."\n";	// message
$code .= $this->Associer($this->titre, 'class="association"');
if (isset($commentaire)) $code .= '<p style="text-align:center">'.$commentaire.'</p>'."\n";	// commentaire éventuel sous l'image
return $code;
}
}

class Piece extends Association_image_fichier {
private	$nom;
private	$repere;
private $quantite;
private $matiere;
private $URL_matiere;
private $observation;

public function __construct($T_param) {  // constructeur utilisant le résultat d'une requête transmise sous forme de tableau associatif
$this->nom = $T_param['nom'];
$this->repere = $T_param['repere'];
$this->quantite = $T_param['quantite'];	
$this->matiere = $T_param['matiere'];
$this->URL_matiere =  $T_param['URL_wiki'];
$this->observation =  $T_param['observation'];
$T_param['dossier'] = 'Supports/'.$T_param['dossier'].'/';

parent::__construct($T_param['dossier'], $T_param['fichier'], $T_param['fichier'].$T_param['extension']); // constructeur de la classe mère.
// Rem: l'image et le fichier doivent porter le même nom. image_alt = nom de la pièce
}

public function Code() {
$code = '<tr>'."\n";
$code .= '<td>'.$this->repere.'</td>'."\n";
$code .= '<td>'.$this->Associer($this->nom).'</td>'."\n";	// lien image-fichier
$code .= '<td>'.$this->nom;
if($this->quantite > 1)					// si plusieurs exemplaires
	$code .= ' (x'.$this->quantite.')';	// alors on rajoute la quantité
$code .= '</td>'."\n";	// on ferme la cellule

$code .= '<td>';	// matière
if($this->matiere!='')	$code .= '<a href="https://fr.wikipedia.org/wiki/'.$this->URL_matiere.'" target="_blank">'.$this->matiere.'</a>';
$code .= '</td>'."\n";

$code .= '<td>'.$this->observation.'</td>'."\n";	
$code .= '</tr>'; // fin de la ligne
return $code."\n\n";
}
}
?>
