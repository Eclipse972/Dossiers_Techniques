<?php
class Association_image_fichier {
	var $lien;			// faisant le lien entre le fichier et l'image
	var $titre;
	var $commentaire;	// texte sous l'image

	function Association_image_fichier($dossier, $nom_fichier, $extension, $titre, $commentaire = '') { // constructeur
	
		// l'image et le fichier associés portent le même nom de fichier mais une extension et un emplacement différents.
		if(!file_exists($fichier= $dossier.'pieces/'.$nom_fichier.$extension)) 	$fichier = '#';					// si le fichier n'existe pas alors le lien est vide
		if(!file_exists($image	= $dossier.'images/'.$nom_fichier.'.png'))		$image = 'Vue/pas2photo.png';	// si l'image n'existe pas alors on remplace par l'image "pas de photo"

		$this->lien			= '<a href="'.$fichier.'"><img src="'.$image.'"></a>';	// prévoir texte alternatif $code .= 'alt ="'. ?? .'"></a>';
		$this->titre		= $titre;
		$this->commentaire	= $commentaire;
	}
	
	function Page() {	// renvoie le code html pour afficher la page
		$code  = "\n\t<h1>".$this->titre."</h1>";		// titre
		$code .= "\n\t<p>Cliquez sur l&#145;image pour t&eacute;l&eacute;charger le fichier au format eDrawing.</p>";	// message
		$code .= "\n\t".$this->lien;	// image cliquable
		if($this->commentaire != '') $code .= "\n\t<p>".$this->commentaire.'</p>';	// commentaire éventuel sous l'image
		return $code;
	}
}
/***********************************************************************************************************************************************
	classes filles
***********************************************************************************************************************************************/

class Piece extends Association_image_fichier {
	var $designation;
	var $quantite;
	var $matiere;
	var $observation;
	
	function Piece($designation, $dossier, $fichier, $quantite = 1, $matiere = '', $observation = '', $extension_fichier = '.EPRT') {	// constructeur
		parent::Association_image_fichier($dossier, $fichier, $extension_fichier, '', '');
		$this->designation	= $designation;
		$this->quantite		= $quantite;
		$this->matiere		= $matiere;
		$this->observation	= $observation;
	}
}
