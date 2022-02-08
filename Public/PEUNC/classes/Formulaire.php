<?php	// formulaire de PEUNC

namespace PEUNC;

abstract class Formulaire extends Page
{
	public function __construct($alpha, $beta, $gamma, $methode, array $TparamURL = [])
	{
		parent::__construct($alpha, $beta, $gamma, $methode, $TparamURL);
		if ($methode == "GET")
			Formulaire::SauvegarderPosition($alpha, $beta, $gamma);
	}

// Fonctions abstraites =======================================================================

	abstract public function SpamDétecté();	// recherche de spam

	abstract public function TraiterSpam();	// traiter le sppam. exemple ajouter une entrée dans un journal

	abstract public function FormulaireOK();// les champs ont la forme attendue et le code de validatio est bon

	abstract public function Traitement();	// traitement si tout est OK. Par exemple envoyer un courriel, modifier une BD

	abstract public function TraitementAvantRepresentation();	// prépare le formulaire pour un réaffichage en  générant des messages d'erreur par exemple'

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
