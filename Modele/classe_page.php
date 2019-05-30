<?php
class Page_abstraite { // classe servant de modèle  toutes les autres
	private $titre;		// de la page

	public function __construct() {
		$titre = '';
	}	// car rian à faire
	
	// Assesseurs ---------------------------------------------------------------------------------
	public function Titre() { return $this->titre; }

	// Mutateurs ----------------------------------------------------------------------------------
	public function Dénommer($titre) { $this->titre = $titre; }

	// autres méthodes ----------------------------------------------------------------------------

	public function Afficher() { // code pour afficher la page
		echo "\t".'<h1>'.$this->titre.'</h1>'."\n"; // première instruction commune à toutes les pages
	}
}
/* ************************************************************************************************
 * 	classes filles
 * ************************************************************************************************
*/
class Page_nomenclature extends Page_abstraite {
	public function __construct(){
		$oSupport = unserialize($_SESSION['support']);
		$this->Dénommer('Nomenclature '.$oSupport->Du_support());
	}
	public function Afficher() { // code pour afficher la page
		parent::Afficher();
		?>
		<p>Cliquez sur l&apos;image de la pi&egrave;ce pour la t&eacute;l&eacute;charger au format eDrawing.</p>
		<p>Cliquez sur le nom de la mati&egrave;re pour trouver sa défition sur wikip&eacute;dia dans un nouvel onglet.</p>

		<table id="nomenclature">
		<thead>
		<tr>
		<th>Rep</th>
		<th>Image</th>
		<th>D&eacute;signation (x quantit&eacute;)</th>
		<th>Mati&egrave;re</th>
		<th>Observations</th>
		</tr>
		</thead>

		<tbody>
		<?php
		$oSupport = unserialize($_SESSION['support']);
		$nomenclature = $oSupport->Nomenclature();
		if (isset($nomenclature))
			foreach ($nomenclature as $piece) echo $piece->Code();
		else trigger_error('Nomenclature inexistante', E_USER_WARNING);
		?>
		</tbody>
		</table>
		<p>Attention: les images ne sont pas &agrave; l&apos;&eacute;chelle.</p>
		<?php
	}	
}

class Page_script extends Page_abstraite { // page chargeant une page de code
	private $script;
	
	public function __construct($script) {
		$oSupport = unserialize($_SESSION['support']);
		$this->script = (file_exists($oSupport->Dossier().$script)) ? $oSupport->Dossier().$script : 'Vue/oups.php';
	}
	
	public function Afficher() { include $this->script; }	// code pour afficher la page
}

class Page_association_image_fichier extends Page_abstraite {
	private $image;
	private $fichier;

	public function __construct($image, $extension_image, $fichier, $extension_fichier) {
		$dossier = unserialize($_SESSION['support'])->Dossier();
		
		$this->image = $this->Fichier_existe($dossier.'images/', $image, $extension_image);
		
		if (!isset($fichier)) $fichier = $image; // par défaut les deux fichiers portent le même nom
		$this->fichier = $this->Fichier_existe($dossier.'fichiers/', $fichier, $extension_fichier, '#');
	}
	private function Fichier_existe($dossier, $fichier, $extension, $substitution = 'Vue/pas2photo.png') {
		$fichier = $dossier.$fichier.$extension;
		return (file_exists($fichier)) ? $fichier : $substitution;
	}
	public function Afficher($commentaire = null) { // code pour afficher la page
		parent::Afficher();	// affiche le titre
		echo "\t".'<p style="text-align:center">Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>'."\n";
		echo "\t".'<a href="'.$this->fichier.'"><img src="'.$this->image.'" class="association" alt = "'.$this->Titre().'"></a>'."\n";
		if (isset($commentaire)) echo '<p>'.$commentaire.'</p>'."\n";
	}
}

/* ************************************************************************************************
 * 	classes petites-filles
 * ************************************************************************************************
*/
class Page_dessin_densemble extends Page_association_image_fichier {
	public function __construct($image, $fichier = null) { // image & fichier sans extension
		parent::__construct($image, '.png', $fichier, '.EDRW');
		$this->Dénommer('Dessin d&apos;ensemble');
	}
}

class Page_dessin2définition extends Page_association_image_fichier {
	public function __construct($titre, $image, $fichier = null) { // image & fichier sans extension
		parent::__construct($image, '.png', $fichier, '.EDRW');
		$this->Dénommer('Dessin de d&eacute;finition '.$titre);
	}
}

class Page_éclaté extends Page_association_image_fichier {
	public function __construct($image, $fichier = null) { // image & fichier sans extension
		parent::__construct($image, '.png', $fichier, '.EASM');
		$this->Dénommer('&Eacute;clat&eacute;');
	}
	public function Afficher() {
		parent::Afficher('</p><p style="text-align:center">Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique');
	}
}

class Page_CE extends Page_association_image_fichier {
	public function __construct($titre, $image, $fichier = null, $extension = '.EASM') {
																// il existe des CE n'ayant qu'un pièce => extension = .EPRT
		parent::__construct($image, '.png', $fichier, $extension);
		$this->Dénommer($titre);
	}
}




