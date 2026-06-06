<?php
/**
 * Classe abstraite et mère des contrôleurs de chaque support
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

abstract class SupportControleur
{
	// propritétés à instancier obligatoirement
	public string $nom;			// nom tout en minuscules
	public string $article_du;	// "du ", "de la " ou "de l'"
	public string $dossier;		// emplacement racine des fichiers associés
	public string $logo;			// image du support

    /**
     * Constructeur : injection du moteur de templates.
     *
     * Utilise la promotion de propriété PHP 8 : le mot clé
     * `private` dans les paramètres déclare et initialise
     * automatiquement la propriété $vue, ce qui évite
     * d'écrire $this->vue = $vue; dans le corps du constructeur.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(protected Twig $vue) {}

    /**
     * Hydratation pour chaque support
     *
     * @param string $nom     Nom du support
     * @param string $du      Article défini contracté (ex : "de l'")
     * @param string $dossier Dossier racine du support (sans espace)
     * @param string $logo	  image du support servant de logo
	 *
	 * ATTENTION: le dossier ne doit pas contenir d'espace
     */
    public function hydrate(string $nom, string $du, string $dossier, string $logo): void {
        $this->nom        = $nom;
        $this->article_du = $du;
        $this->dossier    = $dossier;
        $this->logo       = $logo;
    }

	/**
	 * Le dossier technique minimal d'un support nécessite les pages suivantes :
	 * 	- une mise en situation
	 * 	- un dessin d'ensemble
	 * 	- une nomenclature
	 * 	- une page 'à propos' donnant une archive zip et une description
	 */
	abstract public function miseEnSituation(Request $requete, Response $reponse): Response;
	abstract public function dessinDensemble(Request $requete, Response $reponse): Response;
	abstract public function aPropos(Request $requete, Response $reponse): Response;
	abstract public function nomenclature(Request $requete, Response $reponse): Response;

	/********************************************************************************************************************
	 * Les rendus des pages classiques
	 * ===============================
	 * Beaucoup de pages reposent sur le même modèle. L'objectif est de factoriser le code ici.
	 * Les classes-filles appelleront simplement ces méthodes.
	 *
	 * Ces pages sont :
	 * 	- page de dossier technique en construction
	 * 	- mise en situation
	 * 	- dessin d'ensemble
	 * 	- nomenclature
	 * 	- éclaté
	 * 	- les pages de type association image-fichier
	 * 	- les pages pur html
	 **********************************************************************************************************************/

	/**
	 * Rendu des pages en construction d'un dossier technique
	 *
	 * @param Request $requete
	 * @param Response $reponse
	 *
	 * @return Response
	 */
    public function renduPageEnConstruction(Request $requete, Response $reponse): Response {
		return $this->vue->render($reponse, '113-en-construction.html.twig', [
				'support'	=> $this->nom,
				'logo'		=> $this->logo,
				'du'		=> $this->article_du,
				'dossier'	=> $this->dossier,
				'url'		=> $requete->getUri()->getPath()
  		]);
	}

	/**
	 * Rendu des pages de mise en situation
	 *
	 * @param Response $reponse
	 *
	 * @return Response
	 */
    public function renduMES(Response $reponse): Response {
		return $this->vue->render($reponse, '112-pageDT.html.twig', [
				'support'	=> $this->nom,
				'logo'		=> $this->logo,
				'du'		=> $this->article_du,
				'dossier'	=> $this->dossier,
				'fichier'	=> 'mise-en-situation',
  		]);
	}

	/**
	 * Rendu des pages à propos
	 *
	 * @param Response      $reponse        Objet réponse HTTP
	 * @param string|null	$archiveZip     Chemin relatif vers l'archive ZIP (null si indisponible)
	 * @param array			$descriptionZip liste de chaine de caractère
	 * 										['texte 1', 'texte 2', ... ]
	 * @param array         $listeLien      Liste de liens associés, chaque entrée sous la forme
	 *                                      ['url' => string, 'texte' => string]
	 * @return Response
	 */
	public function renduApropos(Response $reponse, ?string $archiveZip, array $descriptionZip, array $listeLien): Response {
		return $this->vue->render($reponse, '13-page-a-propos.html.twig', [
			'support'		=> $this->nom,
			'logo'			=> $this->logo,
			'du'			=> $this->article_du,
			'dossier'		=> $this->dossier,
			'archiveZip'	=> $archiveZip,
			'descriptionZip'=> $descriptionZip,
			'listeLien'		=> $listeLien,
		]);
	}

	/**
	 * Rendu des pages de nomenclature
	 *
	 * @param Response	$reponse        Objet réponse HTTP
	 * @param array		$nomenclature
	 */
	public function renduNomenclature(Response $reponse, array $nomenclature): Response {
		return $this->vue->render($reponse, '111-nomenclature.html.twig', [
			'support'	=> $this->nom,
			'logo'		=> $this->logo,
			'du'		=> $this->article_du,
			'dossier'	=> $this->dossier,
			'app_data'	=> $nomenclature,
		]);
	}

	/**
	 * Rendu des pages de dessin d'ensemble
	 *
	 * @param Response	$reponse        Objet réponse HTTP
	 */
	public function renduDessinDensemble(Response $reponse): Response {
		return $this->vue->render($reponse, '114-dessin-densemble.html.twig', [
			'support'	=> $this->nom,
			'du'		=> $this->article_du,
			'dossier'	=> $this->dossier,
			'logo'		=> $this->logo,
		]);
	}

	/**
	 * Rendu des pages de d'éclaté
	 *
	 * @param Response	$reponse        Objet réponse HTTP
	 */
	public function renduEclate(Response $reponse): Response {
		return $this->vue->render($reponse, '115-eclate.html.twig', [
			'support'	=> $this->nom,
			'du'		=> $this->article_du,
			'dossier'	=> $this->dossier,
			'logo'		=> $this->logo,
		]);
	}

	/**
     * Rendu des pages foncionnement
     *
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function renduFonctionnement(Response $reponse): Response
    {
        return $this->vue->render($reponse, '112-pageDT.html.twig', [
			'support'	=> $this->nom,
			'du'		=> $this->article_du,
			'dossier'	=> $this->dossier,
			'logo'		=> $this->logo,
			'fichier'	=> 'fonctionnement',
		]);
    }

	/*****************************************************************************************************************
	 * Fonctions utilitaires
	 * =====================
	 * Elles sont statiques permettant de les utiliser independamment de l'objet comme un outil
	 *****************************************************************************************************************/

	/**
	 * Ajoute un lien à une liste.
	 *
	 * Garantit la cohérence du tableau : évite les erreurs d'ordre des clés
	 * ou faute de frappe sur leur nom ('urll', 'Url', etc.).
	 *
	 * @param array  &$liste La liste de liens à compléter
	 * @param string  $url   L'URL du lien
	 * @param string  $texte Le texte affiché
	 *
	 * @example
	 * $liste = [];
	 * self::ajouteLien($liste, 'https://example.com', 'Accueil');
	 * self::ajouteLien($liste, 'https://example.com/contact', 'Contact');
	 *
	 * Résultat:
	 * 	$liste === [
	 * 		['url' => 'https://example.com',         'texte' => 'Accueil'],
	 * 		['url' => 'https://example.com/contact', 'texte' => 'Contact'],
	 * 	]
	 */
	public static function ajouteLien(array &$liste, string $url, string $texte): void
	{
		$liste[] = ['url' => $url, 'texte' => $texte];
	}

	/**
	 * Ajoute une ligne à une nomenclature.
	 *
	 * Garantit la cohérence du tableau de nomenclature en uniformisant les clés.
	 *
	 * @param array       &$nomenclature Le tableau de nomenclature à compléter
	 * @param string       $nom          Le nom de la pièce ou de l'élément
	 * @param int          $repere       Le numéro de repère de la pièce
	 * @param string       $fichier      Le nom du fichier associé
	 * @param string       $image        Le nom de l'image associée
	 * @param int          $quantite     La quantité de l'élément
	 * @param string|null  $matiere      La matière de la pièce (null par défaut)
	 * @param string|null  $observation  Observations ou remarques (null par défaut)
	 *
	 * @example
	 * $nomenclature = [];
	 * self::ajouteLigneNomenclature($nomenclature, 'Vis M6', 1, 'vis-m6', 'vis.png', 4, 'Acier', 'Fixation carter');
	 * self::ajouteLigneNomenclature($nomenclature, 'Écrou', 2, 'ecrou', 'ecrou.png', 4);
	 */
	public static function ajouteLigneNomenclature(array &$nomenclature, string $nom, int $repere, string $fichier, string $image, int $quantite, ?string $matiere = null, ?string $observation = null): void
	{
		$nomenclature[] = [
			'nom'         => $nom,
			'repere'      => $repere,
			'fichier'     => $fichier,
			'image'       => $image,
			'quantite'    => $quantite,
			'matiere'     => $matiere,
			'observation' => $observation
		];
	}
}
