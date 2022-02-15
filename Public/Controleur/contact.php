<?php	// controleur préparation du formulaire
$_SESSION["PEUNC"]["formulaire"]["ObjValidation"] = serialize(new PEUNC\CodeValidation);
$_SESSION["PEUNC"]["formulaire"]["TopDépart"] = time();
$_SESSION["PEUNC"]["formulaire"]["URLretour"] = $this->URLprecedente();
$this->setTitle("Formulaire de contact");
