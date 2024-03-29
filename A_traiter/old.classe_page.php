<?php
// le fichier classe_fichierdoit être chargé au préalable
define("TEXTE",		"[^'\"]");					// ' et " sont interdits car provoque un erreur d'évaluation de code php
define("ENTIER",	"^[1-9][0-9]{0,2}$");		// un entier compris en 1 et 999
define("FICHIER",	"^[a-zA-Z][\w-]+\.?\w*$");// nom de fichier commençant obligatoirement par une lettre avec éventuellement une extension

class Page_abstraite {
}


/* ************************************************************************************************
 * 	classes filles non utilisées directement. Elles servent de mère à d'autres classes.
 * ************************************************************************************************
*/
class Page_association_image_fichier extends Page_abstraite {// cette classe n'est pas utilisée dans la BD
	protected $image;	// objet image
	protected $fichier;	// objet fichier

	public function __construct($image, $extension_image, $fichier, $extension_fichier) {
		if (!isset($fichier)) $fichier=$image;
		$this->image = new Image($image.$extension_image, $this->Dossier().'images/');
		$fichier = new Fichier($fichier.$extension_fichier, $this->Dossier().'fichiers/');
		if (!$fichier->Existe())
			trigger_error('Le fichier de l&apos;association image-fichier n&apos;existe pas', E_USER_WARNING);
		$this->fichier = $fichier;
	}
	public function Afficher($alt, $commentaire = null) { // code pour afficher la page
		parent::Afficher();	// affiche le titre
		echo '<p style="text-align:center">Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>'."\n";	// message
		echo $this->fichier->Lien($this->image->Balise($alt, 'class="association"')),"\n";
		if (isset($commentaire))
			echo '<p style="text-align:center">',$commentaire,'</p>',"\n";	// commentaire éventuel sous l'image
	}
}
/* ************************************************************************************************
 * Classes de pages prédéfines, utilisées dans le site.
 * Toutes ces classes sont hydratées à l'aide de la BD lors de la construction de l'objet
 *
 * Utilisation: le même code quelque soit la page
 * $page = new page(Tableau contenant les paramètres) pour la création et hydratation de la page.
 * $page->Afficher() pour l'affichage sans paramètres
 * ************************************************************************************************
*/
class Page_nomenclature extends Page_abstraite {
	// Pas de paramètre d'hydratation
	private $nomenclature;
	private $colonne_matière;		// colone matière existe
	private $colonne_observation;	// colone observation existe

	public function __construct(){
		$this->Dénommer('Nomenclature');
		$BD = new base2donnees();
		//affichage des deux dernières colonnes si non vides
		$this->colonne_matière = !$BD->Colonne_matiere_vide();
		$this->colonne_observation = !$BD->Colonne_observation_vide();

		$this->nomenclature = $BD->Nomenclature($this->colonne_matière, $this->colonne_observation);
	}
	public function Afficher() { // code pour afficher la page
		parent::Afficher();
		// indentation à cause de l'affichage du code source de la page
?>
<p>Cliquez sur l&apos;image de la pi&egrave;ce pour la t&eacute;l&eacute;charger au format eDrawing.</p>
<p>Attention: les images ne sont pas &agrave; l&apos;&eacute;chelle.</p>
<?php if ($this->colonne_matière) echo "<p>Cliquez sur le nom de la mati&egrave;re pour trouver sa définition sur wikip&eacute;dia dans un nouvel onglet.</p>";?>
<table id="nomenclature">
<thead>
<tr>
	<th>Rep</th>
	<th>Image</th>
	<th>D&eacute;signation (x quantit&eacute;)</th>
	<?php
	if ($this->colonne_matière) echo '<th>Mati&egrave;re</th>',"\n";
	if ($this->colonne_observation) echo "\t",'<th>Observations</th>',"\n";
	?>
</tr>
</thead>

<tbody>
<?php
	if (isset($this->nomenclature))
		foreach ($this->nomenclature as $ligne)	echo "<tr>\n$ligne</tr>\n";
	else trigger_error('Nomenclature inexistante', E_USER_ERROR);
?>
</tbody>
</table>
<?php
	} // fin de Afficher()
}

class Page_script extends Page_abstraite { // paramètre d'hydration: script
	private $script;

	public function __construct($Tparam) {
		$this->Vérifier_hydratation('Page_script', $Tparam, ['script' => FICHIER]);
		$this->script = $this->Dossier().$Tparam['script'].'.php';
	}

	public function Afficher() {
		if (file_exists($this->script)) {
			/* variable pour automatiser l'écriture du dossier d'images.
			 * Il suffit d'ajouter <?=$Dossier_images?> avant le nom de l'image */
			$Dossier_images = $this->Dossier().'images/';
			include $this->script;	// code pour afficher la page
		} else {
?>
	<div id="page_image">
	<h1>D&eacute;sol&eacute; !</h1>
	<p align=center>Il semblerai que je n&apos;ai pas r&eacute;dig&eacute; cette page.</p>
	<?=$_SESSION['support']->Image()?>
	<p align=center>N&apos;h&eacute;sitez pas &agrave; me contacter (lien en bas de page) si le probl&egrave;me persiste.</p>
	</div>
<?php
		}
	}
}

class Page_dessin_densemble extends Page_association_image_fichier {
	// hydratation: image & fichier sans extension
	public function __construct($Tparam) {
		$this->Vérifier_hydratation('Page_dessin_densemble', $Tparam, ['image' => FICHIER], ['fichier' => FICHIER]);
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], '.EDRW');
		$this->Dénommer('Dessin d&apos;ensemble');
	}

	public function Afficher() {
		parent::Afficher('Dessin d&apos;ensemble '.$_SESSION['support']->Du_support());
	}
}

class Page_dessin2définition extends Page_association_image_fichier {
	// hydratation: titre, image et fichier sans extension
	public function __construct($Tparam) {
		$this->Vérifier_hydratation('Page_dessin2définition', $Tparam, ['titre' => TEXTE, 'image' => FICHIER], ['fichier' => FICHIER]);
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], '.EDRW');
		$this->Dénommer('Dessin de d&eacute;finition '.$Tparam['titre']);
	}

	public function Afficher() {
		parent::Afficher('Dessin de d&eacute;finition');
	}
}

class Page_éclaté extends Page_association_image_fichier {
	// hydratation: image & fichier sans extension
	public function __construct($Tparam) {
		$this->Vérifier_hydratation('Page_éclaté', $Tparam, ['image' => FICHIER], ['fichier' => FICHIER]);
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], '.EASM');
		$this->Dénommer('&Eacute;clat&eacute;');
	}

	public function Afficher() {
		parent::Afficher('&Eacute;clat&eacute;'.$_SESSION['support']->Du_support(), 'Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique');
	}
}

class Page_CE extends Page_association_image_fichier {
	/* hydratation: image, fichier et extension
	 * Remarque: l'extension du fichier est obligatoire car il existe des CE réduites à une pièce => extension = .EPRT
	 * */
	private $EstAssemblage;

	public function __construct($Tparam) {
		$this->Vérifier_hydratation('Page_CE', $Tparam, ['nom_CE' => TEXTE, 'image' => FICHIER, 'extension' => TEXTE], ['fichier' => FICHIER]);
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], $Tparam['extension']); // image et fichier doivent porter le même nom
		$this->Dénommer('Classe d&apos;&eacute;quivalence: '.$Tparam['nom_CE']);
		$this->EstAssemblage = ($Tparam['extension'] == '.EASM');
	}
	public function Afficher() {
		parent::Afficher('classe d&apos;&eacute;quivalence', ($this->EstAssemblage) ?
			'Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique' :
			'Cette classe d&apos;&eacute;quivalence est compos&eacute;e d&apos;une seule pi&egrave;ce');
	}
}

class Page_association extends Page_association_image_fichier {
	// hydrataion: titre, image, fichier, extension (du fichier), commentaire
	private $commentaire;

	public function __construct($Tparam) { // image & fichier sans extension
		$this->Vérifier_hydratation('Page_association', $Tparam, ['titre' => TEXTE, 'image' => FICHIER, 'extension' => TEXTE], ['fichier' => FICHIER, 'commentaire' => TEXTE]);
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], $Tparam['extension']);
		$this->Dénommer($Tparam['titre']);
		$this->commentaire = ($Tparam['commentaire']);
	}
	public function Afficher() {
		parent::Afficher('association', $this->commentaire);
	}
}

class Page_courbe extends Page_abstraite { // page contenant une courebe avec/sans tableau de valeurs
	/* hydrataion:
	 * titre
	 * courbe: image de la courbe
	 * alt_courbe: texte alternatif
	 * hauteur:de l'image de la courbe
	 * tableau: image du tableau de valeurs
	 * et alt_tableau: texte alternatif au tableau de valeur
	*/
	private $courbe;
	private $tableau;
	private $alt_tableau;
	private $alt_courbe;
	private $hauteur;

	public function __construct($Tparam) {
		$this->Vérifier_hydratation('Page_courbe', $Tparam, ['titre' => TEXTE, 'courbe' => TEXTE, 'alt_courbe' => TEXTE], ['hauteur' => ENTIER, 'tableau' => TEXTE, 'alt_tableau' => TEXTE]);
		$this->Dénommer($Tparam['titre']);
		$dossier = $this->Dossier().'images/';
		$this->courbe = new Image($Tparam['courbe'], $dossier);
		$this->alt_courbe = $Tparam['alt_courbe'];
		$this->hauteur = (isset($Tparam['hauteur'])) ? $Tparam['hauteur'] : 600;

		// variable pour le tableau
		if (isset($Tparam['tableau'])) {
			$this->tableau = new Image($Tparam['tableau'], $dossier);
			$this->alt_tableau = $Tparam['alt_tableau'];
		} else $this->tableau = null;
	}
	public function Afficher() {
		parent::Afficher();
		echo $this->courbe->Balise($this->alt_courbe, 'class="association" style="height:'.$this->hauteur.'px"'),"\n";
		if (isset($this->tableau)) { // le tableau est il défini?
			echo "<p align=center><b>Tableau de valeurs</b></p>\n";
			echo $this->tableau->Balise($this->alt_tableau, 'class="association"'),"\n";
		}
	}
}
$T_pages_autorisées = array('Page_nomenclature', 'Page_script', 'Page_dessin_densemble', 'Page_dessin2définition',
			'Page_éclaté', 'Page_CE', 'Page_association', 'Page_image_dessus', 'Page_image_dessous', 'Page_courbe');
