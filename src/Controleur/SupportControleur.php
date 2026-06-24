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
	 * ATTENTION: le nom du dossier en kebab-case donc pas d'espace
     */
    public function hydrate(string $nom, string $du, string $dossier, string $logo): void
	{
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
    public function renduPageEnConstruction(Request $requete, Response $reponse): Response
	{
		return $this->vue->render($reponse, '113-en-construction.html.twig', [
				'support'	=> $this->nom,
				'logo'		=> $this->logo,
				'du'		=> $this->article_du,
				'dossier'	=> $this->dossier,
				'url'		=> $requete->getUri()->getPath()
  		]);
	}

	/**
	 * Rendu des pages ordinaires
	 *
	 * Crée une page avec du code isssu d'un fichier.
	 *
	 * @param Response $reponse Objet réponse HTTP
	 * @param string   $fichier Nom du fichier de contenu avec son extension .html.twig ou .html.
	 *
	 * @return Response
	 */
    public function renduPageOrdinaire(Response $reponse, string $fichier): Response
	{
		return $this->vue->render($reponse, '112-pageDT.html.twig', [
				'support'	=> $this->nom,
				'logo'		=> $this->logo,
				'du'		=> $this->article_du,
				'dossier'	=> $this->dossier,
				'fichier'	=> $fichier,
  		]);
	}

	/**
	 * Rendu des pages de mise en situation
	 *
	 * La page mise en situation est le point d'entrée de tous les supports.
	 * URL = /mise-en-situation et
	 * template mise-en-situation.html.twig dans le dossier src/Vue/supports/nom-support.
	 *
	 * @param Response $reponse Objet réponse HTTP
	 *
	 * @return Response
	 */
    public function renduPageMiseEnSituation(Response $reponse): Response
	{
        return $this->renduPageOrdinaire($reponse, 'mise-en-situation.html.twig');
	}


	/**
	 * Rendu des pages de fonctionnement
	 *
	 * La page fonctionnement n'est pas obligatoire mais fortement recommandée.
	 * URL = fonctionnement
	 * template fonctionnement.html.twig dans le dossier src/Vue/supports/nom-support.
	 *
	 * @param Response $reponse Objet réponse HTTP
	 *
	 * @return Response
	 */
    public function renduPageFonctionnement(Response $reponse): Response
	{
        return $this->renduPageOrdinaire($reponse, 'fonctionnement.html.twig');
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
	public function renduApropos(Response $reponse, ?string $archiveZip, array $descriptionZip, array $listeLien): Response
	{
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
	public function renduNomenclature(Response $reponse, array $nomenclature): Response
	{
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
	public function renduDessinDensemble(Response $reponse): Response
	{
		return $this->vue->render($reponse, '114-dessin-densemble.html.twig', [
			'support'	=> $this->nom,
			'du'		=> $this->article_du,
			'dossier'	=> $this->dossier,
			'logo'		=> $this->logo,
		]);
	}

	/**
	 * Rendu des pages d'éclaté
	 *
	 * @param Response  $reponse    Objet réponse HTTP
	 * @param string    $fichier    Nom de base du fichier eDrawing, sans extension (ex: bouton-poussoir)
	 * @param string    $image      Nom de base du fichier image, sans extension (ex: eclate-bouton-poussoir)
	 * @param string    $titre      Titre de la page
	 */
	public function renduEclate(
		Response $reponse,
		string $fichier,
		string $image,
		string $titre = 'Éclaté'
	): Response {
		return $this->vue->render($reponse, '115-eclate.html.twig', [
			'support'   => $this->nom,
			'du'        => $this->article_du,
			'dossier'   => $this->dossier,
			'logo'      => $this->logo,
			'titre'     => $titre,
			'fichier'   => $fichier,
			'image'     => $image,
		]);
	}

	/**
     * Rendu des pages avec image centrale
     *
     * @param Response $reponse Réponse HTTP à retourner
	 * @param string $titre de la page
	 * @param string $texte_au_dessus de l'image
	 * @param string $image nom de fichier avec son extension
	 * @param string $commentaire_image alt de l'image
	 * @param string $texte_au_dessous de l'image
	 * @param int 	 $hauteur de l'image en pixel
	 *
     * @return Response
     */
    public function renduPageImage(
		Response $reponse,
		string	$titre,
		string	$texte_au_dessus,
		string	$image,
		string	$commentaire_image,
		string	$texte_au_dessous,
		int		$hauteur = 400
	): Response {
        return $this->vue->render($reponse, '116-page-image.html.twig', [
			'support'			=> $this->nom,
			'du'				=> $this->article_du,
			'dossier'			=> $this->dossier,
			'logo'				=> $this->logo,
			'titre'				=> $titre,
			'texte_au_dessus'	=> $texte_au_dessus,
			'image'				=> $image,
			'hauteur_image'		=> $hauteur,
			'commentaire_image'	=> $commentaire_image,
			'texte_au_dessous'	=> $texte_au_dessous
		]);
    }

	/**
     * Rendu des pages association image-fichier
     *
     * @param Response $reponse Réponse HTTP à retourner
	 * @param string $titre de la page
	 * @param string $texte_au_dessus de l'image
	 * @param string $image nom de fichier avec son extension
	 * @param string $fichier nom de fichier avec son extension
	 * @param string $commentaire_image alt de l'image
	 * @param string $titre_lien bulle apparaissant au survol de l'image
	 * @param string $texte_au_dessous de l'image
	 * @param int 	$hauteur de l'image en pixel
	 *
     * @return Response
     */
    public function renduPageImageFichier(
		Response $reponse,
		string $titre,
		string $texte_au_dessus,
		string $image,
		string $fichier,
		string $commentaire_image,
		string $titre_lien,
		string $texte_au_dessous,
		int 	$hauteur = 400
	): Response {
        return $this->vue->render($reponse, '117-association-image-fichier.html.twig', [
			'support'			=> $this->nom,
			'du'				=> $this->article_du,
			'dossier'			=> $this->dossier,
			'logo'				=> $this->logo,
			'titre'				=> $titre,
			'texte_au_dessus'	=> $texte_au_dessus,
			'image'				=> $image,
			'fichier'			=> $fichier,
			'hauteur_image'		=> $hauteur,
			'commentaire_image'	=> $commentaire_image,
			'titre_lien'		=> $titre_lien,
			'texte_au_dessous'	=> $texte_au_dessous
		]);
    }

	/**
	 * Rendu des pages vidéo YouTube
	 *
	 * @param Response	$reponse		Objet réponse HTTP
	 * @param string	$titre			Titre de la page
	 * @param string	$chemin_video	Identifiant YouTube de la vidéo (ex : 4ZCPfgWiX2s)
	 *
	 * @return Response
	 */
	public function renduPageVideo(Response $reponse, string $titre, string $chemin_video): Response
	{
		return $this->vue->render($reponse, '15-page-video.html.twig', [
			'support'		=> $this->nom,
			'du'			=> $this->article_du,
			'dossier'		=> $this->dossier,
			'logo'			=> $this->logo,
			'titre'			=> $titre,
			'chemin_video'	=> $chemin_video,
		]);
	}
}
