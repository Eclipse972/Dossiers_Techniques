<?php
class Association_image_fichier {
	// contient le chemin complet pour accéder ...
	protected $image;	// à l'image
	protected $fichier;	// au fichier
	protected $titre;

	public function __construct($dossier, $image, $fichier, $titre = '') {
		// les noms de l'image et du fichier ne sont pas forcément identiques
		$this->image	= Image($image, $dossier.'images/');
		$this->fichier	= Fichier($fichier, $dossier.'fichiers/');
		$this->titre	= $titre; // le titre n'est pas obligatoite notament pour l'objet piece
	}
	public function Afficher($commentaire = '') { // affiche une page avec un tite l'image cliquable avec en dessous un commentaire
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
	public function __construct($dossier, $image, $fichier) { // constructeur
		parent::__construct($dossier, $image, $fichier.'.EDRW', 'Dessin d&apos;ensemble');
	}
}

class Dessin_de_definition extends Association_image_fichier {
	public function __construct($dossier, $image, $fichier) { // constructeur
		parent::__construct($dossier, $image, $fichier.'.EDRW', 'Dessin de d&eacute;finition');
	}
}

class Eclate extends Association_image_fichier {
	public function __construct($dossier, $image, $fichier) {
		parent::__construct($dossier,$image, $fichier.'.EASM', '&Eacute;clat&eacute;');
	}
	public function Afficher() {
		parent::Afficher('Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique');
	}
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
	public function Afficher() {
		echo '<tr>',"\n";
		echo '<td>', $this->repere, '</td>',"\n";

		echo '<td><a href="'.$this->fichier.'"><img src="'.$this->image.'" alt = "'.$this->nom.'"></a></td>',"\n";	// lien image-fichier

		echo '<td>', $this->nom;	// désignation
		if($this->quantite > 1)					// si plusieurs exemplaires
			echo ' (x', $this->quantite, ')';	// alors on rajoute la quantité
		echo '</td>',"\n";	// on ferme la cellule

		echo '<td>';	// matière
		if($this->matiere!='')	echo '<a href="https://fr.wikipedia.org/wiki/',$this->URL_matiere,'" target="_blank">',$this->matiere,'</a>';
		echo '</td>',"\n";

		echo '<td>', $this->observation, '</td>',"\n";	// observation	
		echo '</tr>',"\n\n";							// fin de la ligne
	}
}
?>
