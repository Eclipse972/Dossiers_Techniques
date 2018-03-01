<?php
class Support {
var $id;
var $nom;		// nom complet
var $pti_nom;	// nom raccourci utilisable comme nom de fichier (pas de caractère accentué, ni d'espace, ...)
var $dossier;
var $du;
var $le;
var $item;
var $sous_item;	// numéro de la page actuelle

function Support($id, $nom, $pti_nom, $dossier, $du, $le) {	// constructeur
	$this->id		= $id;
	$this->nom		= $nom;
	$this->pti_nom	= $pti_nom; // utilisé pour l'icone du support
	$this->dossier	= 'Supports/'.$dossier.'/';
	$this->du		= $du;
	$this->le		= $le;
	$this->item		= 1; // N° item actuel
	$this->sous_item= 0; // N° sous-item actuel
}
function Image() { echo '<img src="',$this->dossier,'images/',$this->pti_nom.'.png" alt="',$this->le,$this->nom,'">'; }

function Page_existe($item,$sous_item) {
	$connexionBD = new base2donnees;
	$test = $connexionBD->Page_existe($this->id,$item,$sous_item);
	$connexionBD->Fermer();
	return $test;
}
}
