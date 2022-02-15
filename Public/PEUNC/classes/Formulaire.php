<?php	// formulaire de PEUNC

namespace PEUNC;

abstract class Formulaire extends Page
{
	protected $jeton;	// contient la configuration en clair sous la forme d'un objet JSON

	public function __construct($alpha, $beta, $gamma, $methode, array $TparamURL = [])
	{
		parent::__construct($alpha, $beta, $gamma, $methode, $TparamURL);
		if ($methode == "GET")
		{
			// recherche du noeud qui traite le formulaire
			$ID = BDD::SELECT("ID WHERE alpha=? ANS beta=? gamma=? AND methode = 'POST'",[$alpha, $beta, $gamma]);
			$this->jeton = '{"ID":' . $ID .', "depart":' . time() . '}';
		}
		else
		{

		}
	}

// Fonctions pour le jeton ====================================================================

	public function InsérerJeton()	// insère le champ caché jeton dans le formulaire
	{
		// chargement des paramètre de chiffrement
		// chiffrement du jeton
		// code html du champ caché jeton XRSF
	}

	public function AjouterOjetAuJeton($nom, $valeurJSON)
	{
		$this->jeton .= '{"' . $nom . '":' . $valeurJSON . '}';	// les 2 objets ont mis cote à cote
		$this->jeton = str_replace("}{", ", ", $this->jeton);	// fusionne les deux objets
	}

	public function LireJeton($jeton)
	{
		// chargement des paramètre de chiffrement
		// dechiffrement jeton
		// si erreur renvoyer null sinon renvoyer l'objet
	}

	public function SpamDétecté()	// recherche de spam
	{
		// vérifie la présnece du jeton dans les paramètre transmis
		// lecture du jeton
		// si échec alors renvoyer vrai
		// sinon récupérer objet jeton
		// si réponse trop rapide alors renvoyer vrai sinon faux
	}

// Fonctions abstraites =======================================================================

	abstract public function TraiterSpam();	// traiter le sppam. exemple ajouter une entrée dans un journal

	abstract public function FormulaireOK();// les champs ont la forme attendue et le code de validatio est bon

	abstract public function Traitement();	// traitement si tout est OK. Par exemple envoyer un courriel, modifier une BD

	abstract public function TraitementAvantRepresentation();	// prépare le formulaire pour un réaffichage en  générant des messages d'erreur par exemple'
}
