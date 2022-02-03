<?php	// controleur du formulaire
if(empty($_POST))
{	// préparation du formulaire
	$_SESSION["formulaire"]["ObjValidation"] = serialize(new PEUNC\CodeValidation);
	$_SESSION["formulaire"]["TopDépart"] = time();
	$_SESSION["formulaire"]["URLretour"] = $this->URLprecedente();
}
else
{	// traitement du formulaire
	if($this->SpamDétecté())
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

	// Envoi du message

	// une fois le message envoyé
	$_SESSION["formulaire"]["objet"] = $_SESSION["formulaire"]["message"] = ""; // tandis que le nom et le courriel sont conservés
	$_SESSION["formulaire"]["ErreurNom"] = $_SESSION["formulaire"]["ErreurCourriel"] = $_SESSION["formulaire"]["ErreurObjet"] = $_SESSION["formulaire"]["ErreurMessage"] = false;

	// redirection vers page précédente
	header("Location:" . $_SESSION["formulaire"]["URLretour"]);
}
