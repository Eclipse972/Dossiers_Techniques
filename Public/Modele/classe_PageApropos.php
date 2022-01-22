<?php
require"Modele/classe_Page.php";

class PageApropos extends Page {
	private $zip;
	private $descriptionZipHTML;

	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		$this->setView("Apropos.html");
		// pas de feuille de style supplémentaire autre que commun.css chargé par la vue
		$this->zip = "Supports/" . $this->dossier . "fichiers/" . $this->ptiNomSupport . ".zip"; // nom par défaut
		$this->descriptionZipHTML = null;
	}
/* ***************************
 * MUTATEURS (SETTER)
 * ***************************/
	public function setDescriptionZip($codeHTML) { $this->descriptionZipHTML = $codeHTML; }
	public function setZip($fichierZip) {
		$fichier = "Supports/" . $this->dossier . "fichiers/" . $fichierZip . ".zip";
		$this->zip = file_exists($fichier) ? $fichier : null;
	}

/* ***************************
 * ASSESSURS (GETTER)
 * ***************************/
	public function getDescriptionZip() {
		if (file_exists($this->zip))
			$code = isset($this->descriptionZipHTML) ? $this->descriptionZipHTML : "\t<p>la maquette comporte une configuration &eacute;clat&eacute; et le dessin d&apos;ensemble</p>";
		else $code = "";
		return $code . "\n";
	}
/* ***************************
 * AUTRE
 * ***************************/

	public function LienZip() {
		if (file_exists($this->zip)) {
			$code = "<a href=/{$this->zip}>Cliquez ici pour t&eacute;l&eacute;charger l&apos;archive ZIP de la maquette num&eacute;rique</a>";
		} else $code = "<p>Archive zip non disponible</p>";
		return $code . "\n";
	}

	public function LienRetour() { return "/" . $this->dossier . "MES"; }
}
