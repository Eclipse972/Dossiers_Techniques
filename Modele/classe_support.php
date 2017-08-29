<?php
class Support {
var $nom;		// nom complet
var $pti_nom;	// nom raccourci utilisable comme nom de fichier (pas de caractère accentué, ni d'espace, ...)
var $dossier;
var $du;
var $le;
var $menu;

function Support($nom, $pti_nom, $dossier, $du, $le) {	// constructeur
	$this->nom		= $nom;
	$this->pti_nom	= $pti_nom;
	$this->dossier	= 'Supports/'.$dossier.'/';
	$this->du		= $du;
	$this->le		= $le;
	$this->menu		= new Menu($this->dossier);
}
// Associations image-fichier -----------------------------------------------------------------------------
// la fonction Afficher_association est dans le script Vue/fonction.php
function Afficher_dessin_densemble() {
	Afficher_association('Dessin d&apos;ensemble', 'dessin_'.$this->pti_nom, $this->pti_nom, '.EDRW');
}

function Afficher_eclate() {
	Afficher_association('&Eacute;clat&eacute;', 'eclate_'.$this->pti_nom, $this->pti_nom, '.EASM');
}
// -------------------------------------------------------------------------------------------------------
function Afficher_menu()
	{ $this->menu->Afficher_menu($_SESSION[ID_PAGE]); }

function Image()
	{ echo '<img src="',$this->dossier,'images/',$this->pti_nom.'.png" alt="',$this->le,$this->nom,'">'; }

function Titre()
	{ echo '<p>Dossier technique ', $this->du, $this->nom, '</p>'; } 

function Execute($script) {
	if (file_exists($this->dossier.$script.'.php'))
		include $this->dossier.$script.'.php';
	else include 'Vue/en_construction.php';
}

function Afficher_nomenclature() {
	$connexionBD = new base2donnees;	
	$nomenclature = $connexionBD->Nomenclature($_SESSION[ID_SUPPORT], $this->dossier);
	$connexionBD->Fermer();
	if (isset($nomenclature )) {
		foreach ($nomenclature as $piece) $piece->Afficher();
	} else echo '<h1>Erreur Nomenclature</h1>';
}

function Page_existe($id)
	{ return isset($this->menu->T_page[$id]); }
}
