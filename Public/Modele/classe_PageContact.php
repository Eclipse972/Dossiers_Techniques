<?php	// page avec formulaire de contact
require"PEUNC/classes/Contact.php";

class PageContact extends PEUNC\classes\Contact {
	public function __construct() {
		parent::__construct();
		$this->setView("formulaire.html");
	}

	public function LienRetour() {
		global $BD;
		$Treponse = $BD->ResultatSQL("SELECT URL FROM Vue_URLvalides WHERE niveau1 = ? AND niveau2 = ? AND niveau3 = ?", array($_SESSION['alphaPrecedent'],$_SESSION['betaPrecedent'],$_SESSION['gammaPrecedent']));
		return $Treponse[0]["URL"];
	}
}
