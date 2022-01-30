<?php	// controleur du formulaire
$this->setTopDepart();
$_SESSION["formulaire"]["ObjValidation"] = serialize(new PEUNC\CodeValidation);
