<?php	// controleur du formulaire
if(empty($_POST))
{	// préparation du formulaire
	$_SESSION["formulaire"]["ObjValidation"] = serialize(new PEUNC\CodeValidation);
	$_SESSION["formulaire"]["TopDépart"] = time();
	$_SESSION["formulaire"]["URLretour"] = $this->URLprecedente();
	$this->setTitle("Formulaire de contact");
}
else
{	// traitement du formulaire
	if ($this->SpamDétecté())
	{	// tentative de spam
		header("Location:/"); // Redirection
		exit;
	}

	$this->SauvegardeChampsFormulaire();	// lecture du tableau $_POST

	if (!$this->FormulaireOK())
	{
		header("Location:/Contact"); // Redirection vers le formulaire de contact car il y a erreur
		exit;
	}

	// les drapeaux des erreurs sont baissés
	$_SESSION["formulaire"]["ErreurNom"] = $_SESSION["formulaire"]["ErreurCourriel"] = $_SESSION["formulaire"]["ErreurObjet"] = $_SESSION["formulaire"]["ErreurMessage"] = false;

	if ($this->EnvoyerMessage())	// l'envoi du courriel s'est bien déroulée?
	{
		$_SESSION["formulaire"]["objet"] = $_SESSION["formulaire"]["message"] = ""; // le nom et le courriel sont conservés
		header("Location:" . $_SESSION["formulaire"]["URLretour"]); // redirection vers page précédente
	} else {
		header("Location:/Contact"); // Redirection vers le formulaire de contact car il y a eut un pb avec 'envoi du courriel
	}
}
