<?php
class Index extends PEUNC\classes\Page {

	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		// valeurs par défaut
		$this->setTitle("Les dossiers techniques de ChristopHe");
		$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
		$this->setLogo("logo.png");
		$this->setFooter("");
		$this->setView("index.html");
		$this->setCSS(array("https://fonts.googleapis.com/css?family=Quicksand:400,700&effect=outline", "commun", "index"));
	}
}
