<?php
class Support {
var $nom;		// nom complet
var $pti_nom;	// nom raccourci utilisable comme nom de fichier (pas de caractère accentué, ni d'espace, ...)
var $image;
var $dossier;
// variables définies dans le fichier de configuration
var $du;
var $le;

function Support($nom, $pti_nom, $dossier, $du  = 'du ', $le = 'le ') {	// constructeur
	$this->nom		= $nom;
	$this->pti_nom	= $pti_nom;
	$this->image	= $pti_nom.'.png';
	$this->dossier	= 'Supports/'.$dossier.'/';

	// les variables suivantes seront définies grâce au fichier de configuration
	$this->du = $du; // valeurs par défaut si on oublie de les indiquer dans le fichier de configuration.
	$this->le = $le;
}
}
