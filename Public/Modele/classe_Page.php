<?php
class Page extends PEUNC\classes\Page {

	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		// valeurs par défaut
		$this->setTitle("Les dossiers techniques de ChristopHe");
		$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe</p>");
		$this->setLogo("logo.png");
		$this->setFooter("");
		$this->setView("doctype.html");
	}
}
