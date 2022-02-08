<?php	// formulaire de PEUNC

namespace PEUNC;

class Formulaire extends Page
{
	public function __construct($alpha, $beta, $gamma, $methode, array $TparamURL = [])
	{
		parent::__construct($alpha, $beta, $gamma, $methode, $TparamURL);
		if ($methode == "GET")
			Formulaire::SauvegarderPosition($alpha, $beta, $gamma);
	}

// traitement du formuaire (POST) =============================================================

	public function TraiterParametres()
	{
		// l'objet ReponseClient fait un petit nettoyage puis dépose le résultat dans cet objet
	}

	public function SpamDétecté() { return false; }

	public function FormulaireOK() { return false; }

	public function Traitement() {}

// fonctions statiques ========================================================================

	public static function SauvegarderPosition($alpha, $beta, $gamma)
	{
		$_SESSION["PEUNC"]['formAlpha'] = $alpha;
		$_SESSION["PEUNC"]['formBeta'] = $beta;
		$_SESSION["PEUNC"]['formGamma'] = $gamma;
	}

	public static function DonnerPosition()
	{
		return array($_SESSION["PEUNC"]['formAlpha'], $_SESSION["PEUNC"]['formBeta'], $_SESSION["PEUNC"]['formGamma']);
	}

	public static function EffacerPosition()
	{
		$_SESSION["PEUNC"]['formAlpha'] = $_SESSION["PEUNC"]['formBeta'] = $_SESSION["PEUNC"]['formGamma'] = null;
	}
}
