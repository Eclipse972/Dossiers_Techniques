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

		// hydratation à partir de la BD
		$this->BD = new PEUNC\classes\BDD;
		$Thydrate = $this->BD->ResultatSQL("SELECT nom, texteMenu, ptiNomSupport, du_support, le_support, dossier, zip, image FROM Vue_HydratePage WHERE alpha = ? AND beta = ? AND gamma = ?", array($_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']));
		if (isset($Thydrate))
			list($this->nom,	$this->codeTitre,	$this->ptiNomSupport,	$this->du_support,	$this->le_support,	$this->dossier,	$this->zip,	$this->image) = $Thydrate[0];
			//		nom				texteMenu			ptiNomSupport			du_support			le_support			dossier,		zip,		image
		else $this->nom = $this->codeTitre = $this->tiNomSupport = $this->du_support = $this->le_support = $this->dossier = $this->zip = $this->image = null;
	}
/* ***************************
 * MUTATEURS (SETTER)
 * ***************************/

	public function setTitrePage($titre = "Titre non défini")	{ $codeTitre = $titre; }

/* ***************************
 * ASSESSURS (GETTER)
 * ***************************/

	public function getTitrePage()	{ return "<h1>{$codeTitre}</h1>\n"; }

/* ***************************
 * AUTRE
 * ***************************/

}
