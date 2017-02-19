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
function Afficher_menu()	{ $this->menu->Afficher_menu($_SESSION[ID_PAGE]); }
function Image()				{ echo '<img src="',$this->dossier,'images/',$this->pti_nom.'.png" alt="',$this->le,$this->nom,'">', "\n"; }
function Titre()				{ echo '<p>Dossier technique ', $this->du, $this->nom, "</p>\n"; } 
function Execute($script)	{ include $this->dossier.$script.'.php'; }
}