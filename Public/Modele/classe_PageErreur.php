<?php
require"PEUNC/classes/Erreur.php";

class PageErreur extends PEUNC\Erreur {

	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		// valeurs par défaut
		$this->setTitle("Les dossiers techniques de ChristopHe");
		$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
		$this->setLogo("logo.png");
		$this->setFooter("");
		$this->setView("erreur.html");
		$this->setCSS(array("erreur"));
	}
}
