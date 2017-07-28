<?php
class Support {
var $nom;		// nom complet
var $pti_nom;	// nom raccourci utilisable comme nom de fichier (pas de caractère accentué, ni d'espace, ...)
var $dossier;
var $du;
var $le;
var $menu;

function Support($nom, $pti_nom, $dossier, $du  = 'du ', $le = 'le ') {	// constructeur
	$this->nom		= $nom;
	$this->pti_nom	= $pti_nom;
	$this->dossier	= 'Supports/'.$dossier.'/';
	$this->du		= $du;
	$this->le		= $le;
	$this->menu		= new Menu($this->dossier);
}
// Associations image-fichier -----------------------------------------------------------------------------
function Afficher_association($type) { // la page est composée d'une seul image avec un texte de présentation.
	// les pièces de nomenclature ont un traitement différent bien quelles soient aussi des association image_fichier
	switch($type) {
		case 'dessin_densemble':
		case 'eclate':
		default:
	}
}
function Afficher_dessin_densemble()
	{ Afficher_association('Dessin d&apos;ensemble', 'dessin_'.$this->pti_nom, $this->pti_nom, '.EDRW'); }

function Afficher_eclate()
	{ Afficher_association('&Eacute;clat&eacute;', 'eclate_'.$this->pti_nom, $this->pti_nom, '.EASM'); }
// -------------------------------------------------------------------------------------------------------
function Afficher_menu()
	{ $this->menu->Afficher_menu($_SESSION[ID_PAGE]); }

function Image()
	{ echo '<img src="',$this->dossier,'images/',$this->pti_nom.'.png" alt="',$this->le,$this->nom,'">'; }

function Titre()
	{ echo '<p>Dossier technique ', $this->du, $this->nom, '</p>'; } 

function Execute($script)
	{ include $this->dossier.$script.'.php'; }

function Afficher_nomenclature()
	{ include $this->dossier.'nomenclature.php'; }	// ce fichier ne contient que des instructions Ligne_nomenclature

function Page_existe($id)
	{ return isset($this->menu->T_page[$id]); }
}
