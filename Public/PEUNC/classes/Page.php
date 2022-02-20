<?php
// classe-mère des pages de PEUNC
namespace PEUNC;

include"API_page.php";

class Page implements iPage	{
// CONFIGURATION DE L'APPLICATION

	// dossiers pas défaut
	const DOSSIER_MODEL		= 'Modele/';
	const DOSSIER_VUE		= 'Vue/';
	const DOSSIER_CONTROLEUR= 'Controleur/';
	const DOSSIER_IMAGE		= 'images/';
	const DOSSIER_CSS		= 'CSS/';
	const DOSSIER_JS		= 'js/';
	const DOSSIER_VIDEO		= 'video/';

	// Intervalle pour les onglets
	const ALPHA_MINI = 0;
	const ALPHA_MAXI = 4;

	protected $titrePage	= "Titre de la page affiché dans la barre du haut du navigateur";
	protected $T_CSS		= [];
	protected $entetePage	= "En-tête de la page affichée";
	protected $logo			= "logo.png";
	protected $dossier		= "/";
	protected $scriptSection= "<h1>Page en construction</h1>\n<p>Contactez l&apos;adminitrateur si le probl&egrave;me persiste </p>\n";
	protected $PiedDePage	= "<p>Pied de page &agrave; d&eacute;finir</p>";
	protected $vue			= "doctype.html";
// FIN DE LA CONFIGURATION

	// position
	protected $alpha;
	protected $beta;
	protected $gamma;
	protected $methode;
	//protected $ID; inutile pour le moment

	protected $T_paramURL	= [];

	public function __construct($alpha, $beta, $gamma, $methode, array $TparamURL = [])
	{
		$this->alpha = $alpha;
		$this->beta = $beta;
		$this->gamma = $gamma;
		$this->methode = $methode;
		foreach($TparamURL as $valeur)
			$this->T_paramURL[] = htmlspecialchars($valeur);
	}
/* ***************************
 * MUTATEURS (SETTER)
 * ***************************/
	public function setTitle($titre)		{ $this->titrePage = $titre; }

	public function setHeaderText($texte)	{ $this->entetePage = $texte; }

	public function setLogo($logo)			{ $this->logo = $logo; }			// nom de la forme /sous/dossier/fichier.extension à partir du dossier image du site

	public function setDossier($dossier)	{ $this->dossier = $dossier . "/"; }

	public function setSection($code)		{ $this->scriptSection = $code;	}

	public function setFooter($code)		{ $this->PiedDePage = $code; }

	public function setView($fichier)
	{
		if (file_exists(self::DOSSIER_VUE . $fichier))
			$this->vue = self::DOSSIER_VUE . $fichier;
		else throw new \Exception("Vue inexistante");
	}

	public function setCSS(array $Tableau)
	{
		$this->T_CSS = [];	// les classes filles devront redéfinir pour elles-mêmes la listes des CSS
		foreach($Tableau as $feuilleCSS)
		{
			if(substr($feuilleCSS,0,4) == 'http')
				$this->T_CSS[] = $feuilleCSS;	// pas de vérification
			else
			{
				$feuilleCSS = self::DOSSIER_CSS . $feuilleCSS . ".css";
				if(file_exists($feuilleCSS))
					$this->T_CSS[] = '/' . $feuilleCSS;
				else { /* À faire: traitement en cas d'inexistence */ }
			}
		}
	}

/* ***************************
 * ASSESSURS (GETTER)
 * ***************************/
	public function getTitle()			{ echo $this->titrePage; }

	public function getHeaderText() 	{ echo $this->entetePage,"\n"; }

	public function getLogo()			{ echo Page::BaliseImage($this->logo,'Logo'); }

	public function getDossier()		{ return $this->dossier; }

	public function getSection()		{ echo $this->scriptSection; }

	public function getFooter()			{ echo $this->PiedDePage; }

	public function getView()			{ return $this->vue; }

	public function getParamURL($i = 0)	{ return (isset($this->T_paramURL[$i])) ? $this->T_paramURL[$i] : null; }

	public function getCSS()			{ foreach($this->T_CSS as $feuilleCSS) echo"\t<link rel=\"stylesheet\" href=\"", $feuilleCSS,"\" />\n";	}

	//public function getID()				{ return $this->ID; }

	public function getAlpha()			{ return $this->alpha; }

	public function getBeta()			{ return $this->beta; }

	public function getGamma()			{ return $this->gamma; }

	public function getMethode()		{ return $this->methode; }

/* ***************************
 * méthodes statiques
 * ***************************/

	public static function BaliseImage($src, $alt = '<b>Image ici</b>', $code = '')
	{
		if(substr($src,0,4) != 'http')	// fichier interne?
		{
			//		chemin absolu?				suppression de / au début		ajout dossier image
			$src = (substr($src,0,1) == '/') ? substr($src,1,strlen($src)) : self::DOSSIER_IMAGE . $src;
			$src = (file_exists($src)) ? '/' . $src : "/PEUNC/images/image_absente.png";
		}
		return '<img src="' . $src . '" alt="' . $alt . '" ' . $code . '>';
	}

	public static function SauvegardeEtat(HttpRouter $route)
	{
		// sauvegarde de l'état précédent
		if (isset($_SESSION["PEUNC"]['alpha'])) // défini => une page a été mémorisée
		{
			if(($_SESSION["PEUNC"]['alpha'] < 0) || ($route->getMethode == "POST"))	// page spéciale OU traitement de formulaire
					$T_etatPrecedent = [$_SESSION["PEUNC"]['alphaPrecedent'],$_SESSION["PEUNC"]['betaPrecedent'],	$_SESSION["PEUNC"]['gammaPrecedent']];	// l'état précédent reste le même pour les pages spéciales (erreur, pages admin, ...)
			else	$T_etatPrecedent = [$_SESSION["PEUNC"]['alpha'],		 $_SESSION["PEUNC"]['beta'],			$_SESSION["PEUNC"]['gamma']];			// sauvegarde état actuel
		}
		else		$T_etatPrecedent = [0, 0, 0];	// alpha non défini => on vient de l'ailleurs. On mémorise la page d'accueil

		list($_SESSION["PEUNC"]['alphaPrecedent'], $_SESSION["PEUNC"]['betaPrecedent'], $_SESSION["PEUNC"]['gammaPrecedent']) = $T_etatPrecedent;

		// MAJ de l'état
		$_SESSION["PEUNC"]['alpha']	= $route->getAlpha();
		$_SESSION["PEUNC"]['beta']	= $route->getBeta();
		$_SESSION["PEUNC"]['gamma']	= $route->getGamma();
	}

/* ***************************
 * AUTRE
 * ***************************/

	public function ExecuteControleur()
	{
		$script = BDD::SELECT("controleur FROM Squelette WHERE alpha= ? AND beta= ? AND gamma= ? AND methode = ?",
							[$this->alpha, $this->beta, $this->gamma, $this->methode]);
		if($script == "")
			throw new \Exception("Controleur non d&eacute;fini");
		elseif (file_exists(self::DOSSIER_CONTROLEUR. $script))	// script dans le dossier des controleurs
			require(self::DOSSIER_CONTROLEUR . $script);
		elseif (file_exists($script))							//	script défini de manière absolue
			require($script);
		else throw new \Exception("Controleur inexistant");
	}

 	public function AfficherOnglets()
 	{
		$T_Onglets = BDD::Liste_niveau();
		echo "<ul>\n";
		foreach($T_Onglets as $alpha => $code)
		{
			if (($alpha >= Page::ALPHA_MINI) && ($alpha <= Page::ALPHA_MAXI))
				echo "\t<li>" . (($alpha == $this->alpha) ? str_replace('href', 'id="alpha_actif" href', $code) : $code) . "</li>\n";
		}
		echo "\t</ul>\n";
	}

	public function AfficherMenu()
	{
		$T_item = BDD::Liste_niveau($this->alpha);
		echo "\t<ul>\n";
		foreach($T_item as $beta => $code)
		{
			echo "\t<li>", (($beta == $this->beta) ? str_replace('href', 'id="beta_actif" href', $code) : $code), "</li>\n";
			if ($beta == $this->beta)	// sous-menu?
			{
				$T_sous_item = BDD::Liste_niveau($this->alpha, $this->beta);
				if (isset($T_sous_item))	// génération sous-menu s'il existe
				{
					echo "\t<ul>\n";
					foreach($T_sous_item as $gamma => $sous_code)
						echo "\t\t<li>", ($gamma == $this->gamma) ? str_replace('href', 'id="gamma_actif" href', $sous_code) : $sous_code, "</li>\n";
					echo "\t</ul>\n";
				}
			}
		}
		echo "\t</ul>\n";
	}

	public function URLprecedente()
	{
		return BDD::SELECT("URL FROM Vue_Routes WHERE niveau1 = ? AND niveau2 = ? AND niveau3 = ?",
						array($_SESSION["PEUNC"]['alphaPrecedent'],$_SESSION["PEUNC"]['betaPrecedent'],$_SESSION["PEUNC"]['gammaPrecedent']));
	}
}
