<?php
class Association_image_fichier {
var $image;
var $fichier;

function Association_image_fichier($dossier, $image,  $image_alt, $fichier, $extension) { // constructeur
	// iamge et fichier ne sont pas forcément identiques
	$this->image = Image($image, $dossier);
	$this->fichier = Fichier($fichier, $extension, $dossier);
}
function Afficher($titre, $image_alt, $commentaire = '') {
//	si		l'image n'existe pas			  et le fichier n'existe pas
	if (($this->image == 'Vue/pas2photo.png') && ($this->fichier == '#'))
		include 'Vue/en_construction.php'; // alors on charge la page "en construction"
	else {
		echo "\n", '<h1>', $titre, '</h1>';
		echo "\n", '<p>Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>';	// message
		echo "\n", '<a href="', $this->fichier, '">';	// lien vers le fichier
		echo '<img src="', $this->image, '" alt = "',  $image_alt, '"></a>';	// image avec texte alternatif
		echo "\n", '<p>', $commentaire, '</p>', "\n";	// commentaire éventuel sous l'image
	}
}

function Lien_image_fichier($image, $fichier, $extension, $alt) {
	return '<a href="'.Fichier($fichier,$extension,$_SESSION[SUPPORT]->dossier).'"><img src="'.Image($image, $_SESSION[SUPPORT]->dossier).'" alt = "'.$alt.'"></a>';
}

}

// classes filles ---------------------------------------------------------------------------------------------------------------
class Dessin_densemble extends Association_image_fichier {
function Dessin_densemble ($dossier, $image,  $image_alt, $fichier) { // constructeur
	Association_image_fichier($dossier, $image,  $image_alt, $fichier, '.EDRW');
}

function Afficher() {
	return Association_image_fichier::Afficher('Dessin d&apos;ensemble', 'Dessin d&apos;ensemble');
}
}

class Eclate extends Association_image_fichier {
}

class Piece extends Association_image_fichier {
var	$nom;
var	$repere;
var $quantite;
var $matiere;
var $URL_matiere;
var $observation;

function Piece($T_param) {  // constructeur utilisant le résultat de la requête
	$this->nom = $T_param['nom'];
	$this->repere = $T_param['repere'];
	$this->quantité = $T_param['quantité'];
	$this->matiere = $T_param['matiere'];
	$this->URL_matiere =  $T_param['URL_matiere'];
	$this->observation =  $T_param['observation'];
	
	$T_param['dossier'] = 'Supports/'.$T_param['dossier'].'/';
	
	// constructeur de la classe mère. 
	parent::Association_image_fichier($T_param['dossier'], $T_param['fichier'], $this->nom, $T_param['fichier'], $T_param['extension']);
	// Rem: l'image et le fichier doivent porter le même nom. image_alt = nom de la pièce
}
function Afficher() {
	echo '<tr>',"\n";
	echo '<td>', $this->repere, '</td>',"\n";

	echo '<td><a href="'.$this->fichier.'"><img src="'.$this->image.'" alt = "'.$this->nom.'"></a></td>',"\n";	// lien image-fichier

	echo '<td>', $this->nom;								// désignation
	if($this->nombre > 1) echo ' (x', $this->nombre, ')';	// si plusieurs exemplaires alors on rajoute la quantité
	echo '</td>',"\n";										// on ferme la cellule
	
	echo '<td>';	// matière
	if($this->matiere!='')	echo '<a href=https://fr.wikipedia.org/wiki/',$this->URL_matiere,'">',$this->matiere,'</a>';
	echo '</td>',"\n";

	echo '<td>', $this->observation, '</td>',"\n";	// observation	
	echo '</tr>',"\n\n";							// fin de la ligne
}
}
?>
