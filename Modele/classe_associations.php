<?php
class Association_image_fichier {
	// contient le chemin complet pour accéder ...
	var $image;		// à l'image
	var $fichier;	// au fichier
	var $titre;

	function Association_image_fichier($dossier, $image, $fichier, $extension, $titre = '') { // constructeur
		// les noms de l'image et du fichier ne sont pas forcément identiques
		$this->image	= Image($image, $dossier.'images/');
		$this->fichier	= Fichier($fichier, $extension, $dossier.'fichiers/');
		$this->titre	= $titre; // le titre n'est pas obligatoite notament pour l'objet piece
	}
	function Afficher($commentaire = '') { // affiche une page avec un tite l'image cliquable avec en dessous un commentaire
		//	si		l'image n'existe pas		  et le fichier n'existe pas
		if (($this->image == 'Vue/pas2photo.png') && ($this->fichier == '#'))
			include 'Vue/en_construction.php'; // alors on charge la page "en construction"
		else {
			echo "\n", '<h1>', $this->titre, '</h1>';
			echo "\n", '<p style="text-align:center">Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>';	// message
			echo "\n", '<a href="', $this->fichier, '">';	// lien vers le fichier
			echo '<img src="', $this->image, '" class="association" alt = "', $this->titre, '"></a>';	// image avec texte alternatif
			echo "\n", '<p style="text-align:center">', $commentaire, '</p>', "\n";	// commentaire éventuel sous l'image
		}
	}
}

// classes filles simples ---------------------------------------------------------------------------------------------------------------
// Les filles sont identiques à leur mère avec des valeurs particulières pour les variables membre
class Dessin_densemble extends Association_image_fichier {
	function Dessin_densemble($dossier, $image, $fichier) { // constructeur
		parent::Association_image_fichier($dossier, 'dessin_'.$image, $fichier, '.EDRW', 'Dessin d&apos;ensemble');
	}
}

class Eclate extends Association_image_fichier {
	function Eclate($dossier, $image, $fichier) {
		parent::Association_image_fichier($dossier, 'eclate_'.$image, $fichier, '.EASM', '&Eacute;clat&eacute;');
	}
	function Afficher() {
		parent::Afficher('Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique');
	}
}
// classes filles complexes ---------------------------------------------------------------------------------------------------------------
// Les filles ont plus de propriétés que leur mère: plus de variable et/ou de fonction
class Piece extends Association_image_fichier {
	var	$nom;
	var	$repere;
	var $quantite;
	var $matiere;
	var $URL_matiere;
	var $observation;

	function Piece($T_param) {  // constructeur utilisant le résultat d'une requête transmise sous forme de tableau associatif
		global $TRACEUR;
		$TRACEUR->lieu('classe_association.php/Piece (constructeur)');
		$TRACEUR->afficher_tableau('tableau de paramètres',$T_param);	
		
		$this->nom = $T_param['nom'];
		$this->repere = $T_param['repere'];
		$this->quantité = $T_param['quantité'];			
		$this->matiere = $T_param['matiere'];
		$this->URL_matiere =  $T_param['URL_wiki'];
		$this->observation =  $T_param['observation'];

		$T_param['dossier'] = 'Supports/'.$T_param['dossier'].'/';

		parent::Association_image_fichier($T_param['dossier'], $T_param['fichier'], $T_param['fichier'], $T_param['extension']); // constructeur de la classe mère.
		// Rem: l'image et le fichier doivent porter le même nom. image_alt = nom de la pièce
	}
	function Afficher() {
		echo '<tr>',"\n";
		echo '<td>', $this->repere, '</td>',"\n";

		echo '<td><a href="'.$this->fichier.'"><img src="'.$this->image.'" alt = "'.$this->nom.'"></a></td>',"\n";	// lien image-fichier

		echo '<td>', $this->nom;	// désignation
		if($this->quantité > 1)					// si plusieurs exemplaires
			echo ' (x', $this->quantité, ')';	// alors on rajoute la quantité
		echo '</td>',"\n";	// on ferme la cellule

		echo '<td>';	// matière
		if($this->matiere!='')	echo '<a href=https://fr.wikipedia.org/wiki/',$this->URL_matiere,'" target="_blank">',$this->matiere,'</a>';
		echo '</td>',"\n";

		echo '<td>', $this->observation, '</td>',"\n";	// observation	
		echo '</tr>',"\n\n";							// fin de la ligne
	}
}
?>
