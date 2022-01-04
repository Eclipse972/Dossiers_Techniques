<?php // classe mère de toutes les pages du dossier techniques sauf la page index
class Page extends PEUNC\classes\Page {
	private $codeTitre;
	// infos du support
	private $nomSupport;
	private $ptiNomSupport;
	private $du_support;
	private $le_support;
	// variable-membre dossier déja défini dans la classe mère
	private $zip;
	private $imageSupport;

	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		// valeurs par défaut
		$this->setTitle("Les dossiers techniques de ChristopHe");
		$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
		$this->setLogo("logo.png");
		$this->setFooter("");
		$this->setView("doctype.html");
		// pas de feuille CSS supplémentaire à déclarer
	}
/* ***************************
 * MUTATEURS (SETTER)
 * ***************************/

	public function setTitrePage($titre = "Titre non défini")	{ $codeTitre = "<h1>{$titre}</h1>"; }

/* ***************************
 * ASSESSURS (GETTER)
 * ***************************/

	public function getTitrePage()	{ return $codeTitre; }

/* ***************************
 * AUTRE
 * ***************************/

}
