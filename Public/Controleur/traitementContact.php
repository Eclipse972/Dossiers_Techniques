<?php	// controleur du traitement du formulaire
if ($this->SpamDétecté())	// tentative de spam?
	$URL = "/";
else
{
	$this->SauvegardeChampsFormulaire();	// lecture du tableau $_POST

	if ($this->FormulaireOK())
	{
		// les drapeaux des erreurs sont baissés
		$_SESSION["PEUNC"]["formulaire"]["ErreurNom"] = $_SESSION["PEUNC"]["formulaire"]["ErreurCourriel"] = $_SESSION["PEUNC"]["formulaire"]["ErreurObjet"] = $_SESSION["PEUNC"]["formulaire"]["ErreurMessage"] = false;

		if ($this->EnvoyerMessage())	// l'envoi du courriel s'est bien déroulée?
		{
			$_SESSION["PEUNC"]["formulaire"]["objet"] = $_SESSION["PEUNC"]["formulaire"]["message"] = ""; // le nom et le courriel sont conservés
			$URL = $_SESSION["PEUNC"]["formulaire"]["URLretour"]; // redirection vers page précédente
		} else $URL = "/Contact"; // Redirection vers le formulaire de contact car il y a eut un pb avec 'envoi du courriel
	}
	else $URL = "/Contact"; // Redirection vers le formulaire de contact car il y a erreur
}
header("Location:" . $URL); // redirection

