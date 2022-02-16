<?php	// controleur préparation du formulaire
$_SESSION["PEUNC"]["formulaire"]["ObjValidation"] = serialize(new PEUNC\CodeValidation);
$this->setTitle("Formulaire de contact");
