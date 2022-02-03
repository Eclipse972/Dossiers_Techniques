<?php	// classes page de contact de PEUNC
namespace PEUNC;

require "PEUNC/classes/CodeValidation.php";

class Contact extends Page
{
	public function __construct() { parent::__construct(); }
/*
 * des informations sur le formulaire sont sauvegardées dans une tableau associatif de la forme $_SESSION["formulaire"]["données"]
 * données =...
 * nom: sauvegardé s'il a été défini aupararant. Remplissage d'un formulaire dans la même session
 * courriel: idem
 * objet: si la validation n'a été faite corectement il est utile de proposer l'objet
 * code: code de validation
 * ErreurNom, ErreurCourriel, ErreurObjet, ErreurMessage et ErreurCode leurs test respectifs de validité
 * ObjValidation objet validation
 * TopDépart: moment de création du formulaire pour détecter les remplissages trop rapides
 * URLretour: où allez une fois le formulaire rempli
 * */

// AUTRES ==============================================================================
	public function SpamDétecté()
	{	// plusieurs tests successifs
		$spam = (time() - $_SESSION["formulaire"]["TopDépart"] < 5); // trop rapide pour être humain
		if (!$spam) // le premier test est passé?
		{	// 2e test: pas de champ inconnue
			foreach ($_POST as $clé => $valeur)
			{
				if (!in_array($clé, array("nom", "courriel", "objet", "message", "code")))
				{	// clé non autorisée
					$spam = true;
					break;
				}
			}
		}
		if (!$spam) // les 2 premiers sont passés?
		{	// 3e test: tous les champs sont-il là?
			$tableau = array("nom", "courriel", "objet", "message", "code");
			foreach($tableau as $clé => $valeur)
			{
				if (!isset($_POST[$valeur]))
				{
					$spam = true;
					break;
				}
			}
		}
		return $spam;
	}

	private function EnvoyerMessage()
	{	// voir la fonction mailFree() dans test-mail.php situé à la racine
		$start_time = time();
		$additional_headers  = "From: Formulaire DT <dossiers.techniques@free.fr>\r\n";
		$additional_headers .= "MIME-Version: 1.0\r\n";
		$additional_headers .= "Content-Type: text/plain; charset=utf-8\r\n";
		$additional_headers .= "Reply-To: " . $_SESSION["formulaire"]["nom"] . " <" . $_SESSION["formulaire"]["courriel"] . ">\r\n";
		$start_time = time();
		$resultat = mail(
			"christophe.hervi@gmail.com",
			$_SESSION["formulaire"]["objet"],
			$_SESSION["formulaire"]["message"],
			$additional_headers
		);
		$time = time()-$start_time;
		return $resultat & ($time > 1);
	}

	public function SauvegardeChampsFormulaire()
	{	// après avoir exécuté la méthode SpamDétecté, il ne reste que les champs nécessaires
		foreach ($_POST as $clé => $valeur)
			$_SESSION["formulaire"][$clé] = strip_tags($valeur); // on stocke la valeur dans la session après l'avoir nettoyée un peu
	}

	public function AfficherCodeValidation()
	{
		$ObjValidation = unserialize($_SESSION["formulaire"]["ObjValidation"]);
		return $ObjValidation->Afficher();
	}

	public function FormulaireOK()
	{	// chaque champ respecte son format
		$_SESSION["formulaire"]["ErreurNom"] = (strlen($_SESSION["formulaire"]["nom"]) < 2);
		$_SESSION["formulaire"]["ErreurCourriel"] = (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_SESSION["formulaire"]["courriel"]) != 1);
		$_SESSION["formulaire"]["ErreurObjet"] = (strlen($_SESSION["formulaire"]["objet"]) < 2);
		$_SESSION["formulaire"]["ErreurMessage"] = (strlen($_SESSION["formulaire"]["message"]) < 2);

		// vérifie que le code de validation correspond à la valeur attendue
		$ObjValidation = unserialize($_SESSION["formulaire"]["ObjValidation"]);
		$_SESSION["formulaire"]["ErreurCode"] = !$ObjValidation->CodeOK
												(	$_SESSION["formulaire"]["nom"],
													$_SESSION["formulaire"]["courriel"],
													$_SESSION["formulaire"]["objet"],
													$_SESSION["formulaire"]["message"],
													$_SESSION["formulaire"]["code"]
												);
		return
		!(		$_SESSION["formulaire"]["ErreurNom"]
			||	$_SESSION["formulaire"]["ErreurCourriel"]
			||	$_SESSION["formulaire"]["ErreurObjet"]
			||	$_SESSION["formulaire"]["ErreurMessage"]
			||	$_SESSION["formulaire"]["ErreurCode"]
		);

	}

	// Erreurs sur les champs =========================================================
	public function ErreurNom()		{ return $_SESSION["formulaire"]["ErreurNom"]		? "le nom doit comporter au moins deux caract&egrave;res<br>" : ""; }
	public function ErreurCourriel(){ return $_SESSION["formulaire"]["ErreurCourriel"]	? "Courriel invalide<br>" : ""; }
	public function ErreurObjet()	{ return $_SESSION["formulaire"]["ErreurObjet"]		? "L&apos;objet doit comporter au moins deux caract&egrave;res<br>" : ""; }
	public function ErreurMessage() { return $_SESSION["formulaire"]["ErreurMessage"]	? "Le message doit comporter au moins deux caract&egrave;res<br>" : ""; }
	public function ErreurCode()	{ return $_SESSION["formulaire"]["ErreurCode"]		? "<p>Code incorrect</p>" : ""; }

	// valeur par défaut des champs ===================================================
	public function NomParDefaut()		{ return $_SESSION["formulaire"]["nom"]; }
	public function CourrielParDefaut()	{ return $_SESSION["formulaire"]["courriel"]; }
	public function ObjetParDefaut()	{ return $_SESSION["formulaire"]["objet"]; }
	public function MessageParDefaut()	{ return $_SESSION["formulaire"]["message"]; }
}
