<?php	// page avec formulaire de contact
require"PEUNC/classes/Contact.php";

class PageContact extends PEUNC\classes\Contact {
	public function __construct() {
		parent::__construct();
		$this->setView("formulaire.html");
	}

}
