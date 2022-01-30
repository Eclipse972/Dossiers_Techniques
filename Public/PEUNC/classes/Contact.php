<?php
// classes page de contact de PEUNC
namespace PEUNC;

require "PEUNC/classes/CodeValidation.php";

class Contact extends Page {
	protected $top_départ;	// moment où est affiché le formulaire

	public function __construct() {
		parent::__construct();
	}
/*
 * des informations sur le formulaire sont sauvegardées dans une tableau associatif de la forme $_SESSION["formulaire"]["données"]
 * données =...
 * nom: sauvegardé s'il a été défini auparant. Remplissaged'un formulaire dans la même session
 * courriel: idem
 * objet: si la validation n'a été faite corectement il est utile de proposer l'objet
 * ErreurNom, ErreurCourriel, ErreurObjet, ErreurMessage leurs test respectifs de validité
 * ObjValidation objet validation
 * */

// SETTERS ==============================================================================
	public function setTopDepart() { $this->top_départ = time(); }

// GETTERS ==============================================================================
	public function getTopDepart() { return $this->top_départ; }

// AUTRES ==============================================================================
	public function AfficherCodeValidation() {
		$ObjValidation = $this->getValidation();
		return $ObjValidation->Afficher();
	}

	// Erreurs sur les clamps =========================================================
	public function ErreurNom()		{ return $_SESSION["formulaire"]["ErreurNom"]		? "le nom doit comporter au moins deux caract&egrave;res<br>" : ""; }
	public function ErreurCourriel(){ return $_SESSION["formulaire"]["ErreurCourriel"]	? "Courriel invalide<br>" : ""; }
	public function ErreurObjet()	{ return $_SESSION["formulaire"]["ErreurObjet"]		? "L&apos;objet doit comporter au moins deux caract&egrave;res<br>" : ""; }
	public function ErreurMessage() { return $_SESSION["formulaire"]["ErreurMessage"]	? "Le message doit comporter au moins deux caract&egrave;res<br>" : ""; }

	// valeur par défaut des champs ===================================================
	public function NomParDefaut()		{ return $_SESSION["formulaire"]["nom"]; }
	public function CourrielParDefaut()	{ return $_SESSION["formulaire"]["courriel"]; }
	public function ObjetParDefaut()	{ return $_SESSION["formulaire"]["objet"]; }
	public function MessageParDefaut()	{ return $_SESSION["formulaire"]["message"]; }
}
