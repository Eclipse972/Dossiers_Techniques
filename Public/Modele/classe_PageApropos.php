<?php
require"Modele/classe_Page.php";

class PageApropos extends Page {
	private $zip;

	public function __construct(array $TparamURL = []) {
		global $BD;
		parent::__construct($TparamURL);
		$this->setView("Apropos.html");
	}
}
