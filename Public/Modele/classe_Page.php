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

	public function __construct(array $TparamURL = []) {
		parent::__construct($TparamURL);
		// valeurs par défaut
		$this->setTitle("Les dossiers techniques de ChristopHe");
		$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
		$this->setFooter("");
		$this->setView("doctype.html");
		$this->setCSS(array("pageDT"));

		// hydratation à partir de la BD
		$this->BD = new PEUNC\classes\BDD;
		$Thydrate = $this->BD->ResultatSQL("SELECT nom, texteMenu, ptiNomSupport, du_support, le_support, dossier, zip, logo FROM Vue_HydratePage WHERE alpha = ? AND beta = ? AND gamma = ?", array($_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']));

		if (isset($Thydrate))
		{
			$Thydrate = $Thydrate[0]; // car le tableau ne contient qu'une seule ligne
			$this->nom			= $Thydrate["nom"];
			$this->codeTitre	= $Thydrate["texteMenu"];
			$this->ptiNomSupport= $Thydrate["ptiNomSupport"];
			$this->du_support	= $Thydrate["du_support"];
			$this->le_support	= $Thydrate["le_support"];
			$this->dossier		= $Thydrate["dossier"];
			$this->zip			= $Thydrate["zip"];
			$this->logo			= $Thydrate["logo"]; // défini dans la clsse Page de PEUNC
			// sur php 5 list ne fonctionne qu'avec des indices numériques
		}
		else $this->nom = $this->codeTitre = $this->tiNomSupport = $this->du_support = $this->le_support = $this->dossier = $this->zip = $this->logo = null;
	}

/* ***************************
 * MUTATEURS (SETTER)
 * ***************************/

	public function setTitrePage($titre = "Titre non défini")	{ $codeTitre = $titre; }

/*	exemple de contrôleur:
 *	<?php
 *
 *
 */


/* ***************************
 * ASSESSURS (GETTER)
 * ***************************/

	public function getTitrePage()	{ return "<h1>{$codeTitre}</h1>\n"; }

/* ***************************
 * AUTRE
 * ***************************/

}
