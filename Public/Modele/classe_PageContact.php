<?php	// page avec formulaire de contact
require"PEUNC/classes/Contact.php";

class PageContact extends PEUNC\Contact {
	public function __construct($alpha, $beta, $gamma, $methode) {
		parent::__construct($alpha, $beta, $gamma, $methode);
		$this->setView("formulaire.html");
	}

}
