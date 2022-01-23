<?php
require"Modele/classe_Page.php";

class PageApropos extends Page {
	private $zip;
	private $descriptionZipHTML;
	private $T_lientexte;
	private $T_lienURL;

	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		$this->setView("Apropos.html");
		// pas de feuille de style supplémentaire autre que commun.css chargé par la vue
		$this->zip = "Supports/" . $this->dossier . "fichiers/" . $this->ptiNomSupport . ".zip"; // nom par défaut
		$this->descriptionZipHTML = null;
		$this->TtexteLien = $this->T_URLlien = [];
	}
/* ***************************
 * MUTATEURS (SETTER)
 * ***************************/
	public function setDescriptionZip($codeHTML) { $this->descriptionZipHTML = $codeHTML; }

	public function setZip($fichierZip) {
		$fichier = "Supports/" . $this->dossier . "fichiers/" . $fichierZip . ".zip";
		$this->zip = file_exists($fichier) ? $fichier : null;
	}

	public function setLien($texte, $URL) {
		$this->T_lientexte[] = $texte;
		$this->T_lienURL[] = $URL;
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

	public function getLien() {
		switch(count($this->T_lientexte)) {
			case 0:
				$code = "";
				break;
			case 1:
				$code = "\t<p><b>Lien :</b> <a href={$this->T_lienURL[0]} target=_blank>{$this->T_lientexte[0]}</a> (ouverture dans un nouvel onglet)</p>";
				break;
			default:
				$code = "\t<p><u><b>Liens (ouverture dans un nouvel onglet):</b></u></p>\n\t<ul>\n";
				foreach($this->T_lientexte as $i => $texte) {
					$code .= "\t\t<li><a href={$this->T_lienURL[$i]} target=_blank>{$texte}</a></li>\n";
				}
				$code .= "\t</ul>\n";
		}
		return $code . "\n\t<br>\n";
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
