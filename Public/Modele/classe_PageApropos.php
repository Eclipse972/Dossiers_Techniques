<?php
require"Modele/classe_Page.php";

class PageApropos extends Page {
	private $zip;

	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		$this->setView("Apropos.html");
		// pas de feuille de style supplémentaire autre que commun.css chargé par la vue
		$this->zip = "Supports/" . $this->dossier . "fichiers/" . $this->ptiNomSupport . ".zip";
	}

	public function LienZip() {
		global $BD;
		if (file_exists($this->zip)) {
			$code = "<a href=/{$this->zip}>Cliquez ici pour t&eacute;l&eacute;charger l&apos;archive ZIP de la maquette num&eacute;rique</a>\n";
			// infos sur l'archive
			$code .= "\t<p>pas d&apos;infos particuli&egrave;re</p>";
		} else $code = "<p>Archive zip non disponible</p>\n";
		return $code;
	}

	public function LienRetour() { return "/" . $this->dossier . "MES"; }
}
