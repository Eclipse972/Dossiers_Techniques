<?php // classe mère de toutes les pages du dossier techniques sauf la page index
class Page extends PEUNC\Page
{
	protected $codeTitre;
	// infos du support
	protected $nomSupport;
	protected $ptiNomSupport;
	protected $du_support;
	protected $le_support;
	// variable-membre dossier déja défini dans la classe mère

	public function __construct($alpha, $beta, $gamma, $methode, array $TparamURL = [])
	{
		global $BD;
		parent::__construct($alpha, $beta, $gamma, $methode, $TparamURL);
		// valeurs par défaut
		$this->setTitle("Les dossiers techniques de ChristopHe");
		$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
		$this->setFooter(" - <a href=/Contact>Me contacter</a>");
		$this->setView("doctype.html");
		// pas de feuille de style supplémentaire à déclarer

		// hydratation à partir de la BD
		$BD = new PEUNC\BDD;
		$Thydrate = $BD->ResultatSQL("SELECT * FROM Vue_HydratePage WHERE alpha = ? AND beta = ? AND gamma = ?", array($this->alpha, $this->beta, $this->gamma));

		if (isset($Thydrate))
		{
			$this->nom			= $Thydrate["nom"];
			$this->codeTitre	= $Thydrate["texteMenu"];
			$this->ptiNomSupport= $Thydrate["ptiNomSupport"];
			$this->du_support	= $Thydrate["du_support"];
			$this->le_support	= $Thydrate["le_support"];
			$this->dossier		= $Thydrate["dossier"];
			$this->logo			= $Thydrate["logo"]; // défini dans la classe Page de PEUNC
			// sur php 5 list ne fonctionne qu'avec des indices numériques
		}
		else $this->nom = $this->codeTitre = $this->tiNomSupport = $this->du_support = $this->le_support = $this->dossier = $this->logo = null;
	}

/* ***************************
 * MUTATEURS (SETTER)
 * ***************************/

	public function setTitrePage($titre = "Titre non défini")	{ $this->codeTitre = $titre; }

/*	exemple de contrôleur:
 *	<?php
 *
 *
 */


/* ***************************
 * ASSESSURS (GETTER)
 * ***************************/

	public function getTitrePage()	{ return "<h1>{$this->codeTitre}</h1>\n"; }

	public function getDu_support()	{ return $this->du_support; }

/* ***************************
 * AUTRE
 * ***************************/
	public function AfficherMenu()
	{
		parent::AfficherMenu();
		echo"\t<a href=/>Page d&apos;accueil</a>\n";
	}

	public function Apropos()	// renvoie l'URL de la page à propos de la page
	{
		global $BD;
		return $BD->ResultatSQL("SELECT URL FROM Vue_Routes WHERE niveau1 = ? AND niveau2 = 0 AND niveau3 = 0", array($this->alpha));
	}
}
