<?php
// classes page de contact de PEUNC
namespace PEUNC;

// les réponses du formulaire
protected $nom;
protected $courriel;
protected $objet;
protected $message;
protected $code;
// erreurs sur les champs
protected $Erreur_nom;
protected $Erreur_courriel;
protected $Erreur_objet;
protected $Erreur_message;

protected $spam_détecté; // tentative de spam détectée

/*
 * Le code de validation est un mot de 5 caractères composé d'une lettre de chaque champ (soit 4 lettres).
 * Pour le choix du caractère il y a quatre possibilités: premier, deuxième, avant dernier et dernier
 * la dernière lettre est une des 4 premières du code.
 *
 * Exemple de validation:
 * 	deuxième caractère de l'objet
 * 	avant dernier caractère du message
 *  deuxième caractère de votre courriel
 *  dernier caractère de votre nom
 *  quatrième caractère de ce code de validation
 * Si les champs sont :
 * 		nom =  Eclipse972
 * 		courriel = christophe.hervi@free.fr
 * 		objet = Question
 * 		message = Pourquoi un code si compliqué?
 * Le code de validation sera uéh22
*/

// variables nécessaires à la création du code de validation
protected $T_id_champ;	// tableau contenant les numéros de champ
protected $T_choix;		// tableau contenant les positions demandées
protected $dernier_choix; // dernière instruction: position du caractère du code de validation
protected $top_départ;	// moment où est affiché le formulaire

class Contact extends Page {
	public function __construct() {
		parent::__construct();
	}

	public function PrepareFormulaireContact() {
	}

	public function TraiteFormulaireContact()	{
	}

	public function Afficher_validation()	{
		for($i=0;$i<5;$i++)	echo "\n\t\t\t<li>critère</li>";
		echo "\n";
	}
}
