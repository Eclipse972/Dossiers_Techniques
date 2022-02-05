<?php	// controleur préparation du formulaire
$_SESSION["formulaire"]["ObjValidation"] = serialize(new PEUNC\CodeValidation);
$_SESSION["formulaire"]["TopDépart"] = time();
$_SESSION["formulaire"]["URLretour"] = $this->URLprecedente();
$this->setTitle("Formulaire de contact");
