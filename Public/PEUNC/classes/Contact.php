<?php	// formulaire de contact de PEUNC

// classe requise: CodeValidation

namespace PEUNC;

class Contact extends Formulaire
{
	public function __construct($alpha, $beta, $gamma, $methode)
	{
		parent::__construct($alpha, $beta, $gamma, $methode);
		$this->setView("formulaire.html");
	}
/*
 * des informations sur le formulaire sont sauvegardées dans une tableau associatif de la forme $_SESSION["PEUNC"]["formulaire"]["données"]
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
		$spam = (time() - $_SESSION["PEUNC"]["formulaire"]["TopDépart"] < 5); // trop rapide pour être humain
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

	public function EnvoyerMessage()
	{	// voir la fonction mailFree() dans test-mail.php situé à la racine
		$start_time = time();
		$additional_headers  = "From: Formulaire DT <dossiers.techniques@free.fr>\r\n";
		$additional_headers .= "MIME-Version: 1.0\r\n";
		$additional_headers .= "Content-Type: text/plain; charset=utf-8\r\n";
		$additional_headers .= "Reply-To: " . $_SESSION["PEUNC"]["formulaire"]["nom"] . " <" . $_SESSION["PEUNC"]["formulaire"]["courriel"] . ">\r\n";
		$start_time = time();
		$resultat = mail(
			"christophe.hervi@gmail.com",
			$_SESSION["PEUNC"]["formulaire"]["objet"],
			$_SESSION["PEUNC"]["formulaire"]["message"],
			$additional_headers
		);
		$time = time()-$start_time;
		return $resultat & ($time > 1);
	}

	public function SauvegardeChampsFormulaire()
	{	// après avoir exécuté la méthode SpamDétecté, il ne reste que les champs nécessaires
		foreach ($_POST as $clé => $valeur)
			$_SESSION["PEUNC"]["formulaire"][$clé] = strip_tags($valeur); // on stocke la valeur dans la session après l'avoir nettoyée un peu
	}

	public function AfficherCodeValidation()
	{
		$ObjValidation = unserialize($_SESSION["PEUNC"]["formulaire"]["ObjValidation"]);
		return $ObjValidation->Afficher();
	}

	public function FormulaireOK()
	{	// chaque champ respecte son format
		$_SESSION["PEUNC"]["formulaire"]["ErreurNom"] = (strlen($_SESSION["PEUNC"]["formulaire"]["nom"]) < 2);
		$_SESSION["PEUNC"]["formulaire"]["ErreurCourriel"] = (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_SESSION["PEUNC"]["formulaire"]["courriel"]) != 1);
		$_SESSION["PEUNC"]["formulaire"]["ErreurObjet"] = (strlen($_SESSION["PEUNC"]["formulaire"]["objet"]) < 2);
		$_SESSION["PEUNC"]["formulaire"]["ErreurMessage"] = (strlen($_SESSION["PEUNC"]["formulaire"]["message"]) < 2);

		// vérifie que le code de validation correspond à la valeur attendue
		$ObjValidation = unserialize($_SESSION["PEUNC"]["formulaire"]["ObjValidation"]);
		$_SESSION["PEUNC"]["formulaire"]["ErreurCode"] = !$ObjValidation->CodeOK
												(	$_SESSION["PEUNC"]["formulaire"]["nom"],
													$_SESSION["PEUNC"]["formulaire"]["courriel"],
													$_SESSION["PEUNC"]["formulaire"]["objet"],
													$_SESSION["PEUNC"]["formulaire"]["message"],
													$_SESSION["PEUNC"]["formulaire"]["code"]
												);
		return
		!(		$_SESSION["PEUNC"]["formulaire"]["ErreurNom"]
			||	$_SESSION["PEUNC"]["formulaire"]["ErreurCourriel"]
			||	$_SESSION["PEUNC"]["formulaire"]["ErreurObjet"]
			||	$_SESSION["PEUNC"]["formulaire"]["ErreurMessage"]
			||	$_SESSION["PEUNC"]["formulaire"]["ErreurCode"]
		);

	}

	// Erreurs sur les champs =========================================================
	public function ErreurNom()		{ return $_SESSION["PEUNC"]["formulaire"]["ErreurNom"]		? "le nom doit comporter au moins deux caract&egrave;res<br>" : ""; }
	public function ErreurCourriel(){ return $_SESSION["PEUNC"]["formulaire"]["ErreurCourriel"]	? "Courriel invalide<br>" : ""; }
	public function ErreurObjet()	{ return $_SESSION["PEUNC"]["formulaire"]["ErreurObjet"]		? "L&apos;objet doit comporter au moins deux caract&egrave;res<br>" : ""; }
	public function ErreurMessage() { return $_SESSION["PEUNC"]["formulaire"]["ErreurMessage"]	? "Le message doit comporter au moins deux caract&egrave;res<br>" : ""; }
	public function ErreurCode()	{ return $_SESSION["PEUNC"]["formulaire"]["ErreurCode"]		? "<p>Code incorrect</p>" : ""; }

	// valeur par défaut des champs ===================================================
	public function NomParDefaut()		{ return $_SESSION["PEUNC"]["formulaire"]["nom"]; }
	public function CourrielParDefaut()	{ return $_SESSION["PEUNC"]["formulaire"]["courriel"]; }
	public function ObjetParDefaut()	{ return $_SESSION["PEUNC"]["formulaire"]["objet"]; }
	public function MessageParDefaut()	{ return $_SESSION["PEUNC"]["formulaire"]["message"]; }
}
