<?php	// formulaire de PEUNC

namespace PEUNC;

abstract class Formulaire extends Page
{
	protected $jetonJSON;	// contient la configuration en clair sous la forme d'un objet JSON
	protected $O_jetonXSRF;	// objet transmis par le jeton XSRF

	public function __construct($alpha, $beta, $gamma, $methode, array $Tparam = [])
	{
		parent::__construct($alpha, $beta, $gamma, $methode, $Tparam);
		if ($methode == "GET")
		{
			$ID = BDD::SELECT("ID FROM Squelette WHERE alpha=? AND beta=? AND gamma=? AND methode = 'POST'",[$alpha, $beta, $gamma]);// recherche du noeud qui traite le formulaire
			$this->jetonJSON = '{"ID":' . $ID .', "depart":' . time() . ', "URLretour":"' .  $this->URLprecedente() . '"}';
		}
		elseif ($methode == "POST")
		{

		}
		else
		{
			throw new \Exception("Méthode inatendue pour un formulaire");
		}
	}

// Fonctions pour le jeton ====================================================================

	public function InsérerJeton()	// insère le champ caché jeton dans le formulaire
	{
		require"config_chiffrement.php";	// défini $cipher, $key et $iv
		$jetonchiffré = openssl_encrypt($this->jetonJSON, $cipher, $key, $options=0, $iv);
		return $jetonchiffré;
	}

	public function AjouterVariableAuJeton($nom, $valeurJSON)
	{
		$this->jetonJSON .= '{"' . $nom . '":' . $valeurJSON . '}';		// les 2 objets ont mis cote à cote
		$this->jetonJSON = str_replace("}{", ", ", $this->jetonJSON);	// fusionne les deux objets
	}

	public function LireJeton($jetonChiffré)
	{
		require"config_chiffrement.php";	// défini $cipher, $key et $iv
		$jeton = openssl_decrypt($jetonChiffré, $cipher, $key, $options=0, $iv);// dechiffrement jeton
		$O_jeton = json_decode($jeton);		// si erreur renvoyer null sinon renvoyer l'objet
		return $O_jeton;
	}

// Fonctions abstraites =======================================================================

	abstract public function TraiterSpam();	// par exemple ajouter une entrée dans un journal

	abstract public function FormulaireOK();// la liste des champs est correcte et ils ont la forme attendue

	abstract public function Traitement();	// traitement si tout est OK. Par exemple envoyer un courriel, modifier une BD

	abstract public function TraitementAvantRepresentation();	// prépare le formulaire pour un réaffichage en  générant des messages d'erreur par exemple'

//	zone de test ==============================================================================

}
