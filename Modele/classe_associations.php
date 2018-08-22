<?php
class Association_image_fichier {
// contient le chemin complet pour accéder ...
protected $image;	// à l'image
protected $fichier;	// au fichier
protected $titre;

public function __construct($dossier, $image, $fichier, $titre = '') {
// les noms de l'image et du fichier ne sont pas forcément identiques
$image = new Image($image, $dossier.'images/');
$fichier = new Fichier($fichier, $dossier.'fichiers/');
if (!$image->Existe() && !$fichier->Existe())
	trigger_error('L&apos;association image-fichier est vide', E_USER_WARNING);
$this->image = $image->Chemin();
$this->fichier = $fichier->Chemin();
$this->titre = $titre; // le titre n'est pas obligatoire notamment pour l'objet piece
}

// renvoi le code d'une image liée au fichier
public function Associer($alt, $supplement = '') { return '<a href="'.$this->fichier.'"><img src="'.$this->image.'" '.$supplement.' alt = "'.$altm.'"></a>'; }

public function Code($commentaire = '') { // affiche une page avec un tite l'image cliquable avec en dessous un commentaire
$code = '<h1>'.$this->titre.'</h1>'."\n";
$code .= '<p style="text-align:center">Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>'."\n";	// message
$code .= $this->Associer($this->titre, 'class="association"');
$code .= '<p style="text-align:center">'.$commentaire.'</p>'."\n";	// commentaire éventuel sous l'image
return $code;
}
}

// classes filles simples ---------------------------------------------------------------------------------------------------------------
// Les filles sont identiques à leur mère avec des valeurs particulières pour les variables membre
// si image n'a pas d'extension alor .png
// fichier ne doitavoir d'extension
class Dessin_densemble extends Association_image_fichier {
public function __construct($dossier, $image, $fichier) { parent::__construct($dossier, $image, $fichier.'.EDRW', 'Dessin d&apos;ensemble'); }
}

class Dessin_de_definition extends Association_image_fichier {
public function __construct($dossier, $image, $fichier) { parent::__construct($dossier, $image, $fichier.'.EDRW', 'Dessin de d&eacute;finition'); }
}

class Eclate extends Association_image_fichier {
public function __construct($dossier, $image, $fichier) { parent::__construct($dossier,$image, $fichier.'.EASM', '&Eacute;clat&eacute;'); }

public function Code() { return parent::Code('Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique'); }
}
// classes filles complexes ---------------------------------------------------------------------------------------------------------------
// Les filles ont plus de propriétés que leur mère: plus de privateiable et/ou de fonction
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
