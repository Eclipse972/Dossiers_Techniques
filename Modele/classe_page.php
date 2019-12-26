<?php
// le fichier classe_association doit être chargé au préalable

class Page_abstraite {
	// classe servant de modèle toutes les autres
	private $titre;	// de la page
	// Mutateurs ----------------------------------------------------------------------------------
	protected function Dénommer($titre) { $this->titre = $titre; }

	// autres méthodes ----------------------------------------------------------------------------
	protected function Afficher() { // code pour afficher la page
		echo '<h1>'.$this->titre.'</h1>'."\n"; // première instruction commune à toutes les pages
	}
	
	protected function Dossier() // dossier de travail de la page
		{ return $_SESSION['support']->Dossier(); }
	
	protected function Vérifier_hydratation($nom_classe, array $Tparam, array $Tvérification, array $Tfacultatif = []) {
	/* nom_classe:nom de la classe qui appelle la fonction
	 * Tparam: tableau contenat les données d'hydratation
	 * Tvérification:liste des paramètres obligatoires
	 * Tfacultatif: liste des paramètre facultatifs
	 * */
		$message = 'Erreur d\'hydratation dans '.$nom_classe.': '; // début du message d'erreur
		foreach ($Tparam as $clé => $valeur) {	// parcours de $Tparam
			if ((!in_array($clé, $Tvérification))	// clé pas dans les paramètres obligatoires
			 && (!in_array($clé, $Tfacultatif)))	// ni dans les paramètres facultatifs
				trigger_error($message.'la clé '.$clé.' n&apos;est pas autoris&eacute;e', E_USER_WARNING);
			if (!isset($valeur) || $valeur == '')	// valeur incorrecte?
				trigger_error($message.'la valeur pour '.$clé.' est vide ou n&pos;existe pas', E_USER_WARNING);
		}
		foreach($Tvérification as $clé) if (!isset($Tparam[$clé])) // tous les paramètres obligatoires doivent êtres présents
				trigger_error($message.'la clé '.$clé.' est manquante', E_USER_WARNING);
	}
}


/* ************************************************************************************************
 * 	classes filles non utilisées directement. Elles servent de mère à d'autres classes.
 * ************************************************************************************************
*/
class Page_image extends Page_abstraite {
	// cette classe n'est utilisée dans la BD
	private $image;
	private $commentaire;
	private $Audessus;
	
	public function __construct($titre, $image, $commentaire, $Audessus, $hauteur = 400) { // page composée d'une image avec un commentaire au dessus ou au dessous
		$this->Dénommer($titre);
		$dossier = $this->Dossier().'images/';
		$this->image = new Image($image, $dossier);
		$this->commentaire = $commentaire;
		$this->Audessus = $Audessus;
		$this->hauteur = $hauteur;
	}
	
	public function Afficher() { // code pour afficher la page
		parent::Afficher();	// affiche le titre
		$commentaire = '<p>'.$this->commentaire.'</p>';
		if (!$this->Audessus) echo $commentaire;
		echo $this->image->Balise('', 'height='.$this->hauteur.'px class=association');
		if ($this->Audessus) echo $commentaire;
	}
}

class Page_association_image_fichier extends Page_abstraite {
	// cette classe n'est pas utilisée dans la BD
	private $oAssociation;	// objet association image-fichier

	public function __construct($image, $extension_image, $fichier, $extension_fichier) {
		$dossier = $this->Dossier();

		if (!isset($fichier)) $fichier = $image; // par défaut les deux fichiers portent le même nom
		$this->oAssociation = new Association_image_fichier($dossier, $image.$extension_image , $fichier.$extension_fichier);
	}
	public function Afficher($commentaire = null) { // code pour afficher la page
		parent::Afficher();	// affiche le titre
		echo '<p style="text-align:center">Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>'."\n";	// message
		echo $this->oAssociation->Associer('cliquez pour télécharger', 'class="association"');
		if (isset($commentaire)) 
			echo'<p style="text-align:center">'.$commentaire.'</p>'."\n";	// commentaire éventuel sous l'image
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
		$this->Vérifier_hydratation('Page_script', $Tparam, ['script']);
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
		$this->Vérifier_hydratation('Page_dessin_densemble', $Tparam, ['image'], ['fichier']);
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], '.EDRW');
		$this->Dénommer('Dessin d&apos;ensemble');
	}
}

class Page_dessin2définition extends Page_association_image_fichier {
	// hydratation: titre, image et fichier sans extension
	public function __construct($Tparam) {
		$this->Vérifier_hydratation('Page_dessin2définition', $Tparam, ['titre', 'image'], ['fichier']);
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], '.EDRW');
		$this->Dénommer('Dessin de d&eacute;finition '.$Tparam['titre']);
	}
}

class Page_éclaté extends Page_association_image_fichier {
	// hydratation: image & fichier sans extension
	public function __construct($Tparam) {
		$this->Vérifier_hydratation('Page_éclaté', $Tparam, ['image'], ['fichier']);
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], '.EASM');
		$this->Dénommer('&Eacute;clat&eacute;');
	}
	public function Afficher() {
		parent::Afficher('Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique');
	}
}

class Page_CE extends Page_association_image_fichier {
	/* hydratation: image, fichier et extension
	 * Remarque: l'extension du fichier est obligatoire car il existe des CE réduites à une pièce => extension = .EPRT
	 * */
	private $EstAssemblage;
	
	public function __construct($Tparam) {
		$this->Vérifier_hydratation('Page_CE', $Tparam, ['nom_CE', 'image', 'extension'], ['fichier']);
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], $Tparam['extension']); // image et fichier doivent porter le même nom
		$this->Dénommer('Classe d&apos;&eacute;quivalence: '.$Tparam['nom_CE']);
		$this->EstAssemblage = ($Tparam['extension'] == '.EASM');
	}
	public function Afficher() {
		parent::Afficher(($this->EstAssemblage) ? 
			'Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique' :
			'Cette classe d&apos;&eacute;quivalence est compos&eacute;e d&apos;une seule pi&egrave;ce');
	}
}

class Page_association extends Page_association_image_fichier {
	// hydrataion: titre, image, fichier, extension (du fichier), commentaire
	private $commentaire;
	
	public function __construct($Tparam) { // image & fichier sans extension
		$this->Vérifier_hydratation('Page_association', $Tparam, ['titre', 'image', 'extension'], ['fichier', 'commentaire']);
		parent::__construct($Tparam['image'], '.png', $Tparam['fichier'], $Tparam['extension']);
		$this->Dénommer($Tparam['titre']);
		$this->commentaire = ($Tparam['commentaire']);
	}
	public function Afficher() {
		parent::Afficher($this->commentaire);
	}
}

class Page_image_dessus extends Page_image {
	// hydrataion: titre, image, commentaire, hauteur
	public function __construct($Tparam) {
		$this->Vérifier_hydratation('Page_image_dessus', $Tparam, ['titre', 'image', 'commentaire'], ['hauteur']);
		parent::__construct($Tparam['titre'], $Tparam['image'], $Tparam['commentaire'], true, $Tparam['hauteur']);
	}
}

class Page_image_dessous extends Page_image {
	// hydrataion: titre, image, commentaire, hauteur
	public function __construct($Tparam) {
		$this->Vérifier_hydratation('Page_image_dessous', $Tparam, ['titre', 'image', 'commentaire'], ['hauteur']);
		parent::__construct($Tparam['titre'], $Tparam['image'], $Tparam['commentaire'], false, $Tparam['hauteur']);
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
		$this->Vérifier_hydratation('Page_courbe', $Tparam, ['titre', 'courbe', 'alt_courbe'], ['hauteur', 'tableau', 'alt_tableau']);
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
