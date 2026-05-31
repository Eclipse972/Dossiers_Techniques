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
	protected string $nom;			// nom tout en minuscules
	protected string $article_du;	// "du ", "de la " ou "de l'"
	protected string $dossier;		// emplacement racine des fichiers associés
	protected string $logo;			// image du support

	// propriété à instancier par les méthodes des classes-filles
	protected string $template;

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
    public function __construct(private Twig $vue) {}

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
    protected function hydrate(string $nom, string $du, string $dossier, string $logo): void
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
	abstract protected function miseEnSituation(Request $requete, Response $reponse): Response;
	abstract protected function dessinDensemble(Request $requete, Response $reponse): Response;
	abstract protected function aPropos(Request $requete, Response $reponse): Response;
	abstract protected function nomenclature(Request $requete, Response $reponse): Response;

	/**
	 * Les rendus des pages classiques
	 * Beaucoup de pages reposent sur le même modèle. L'objectif est de factoriser le code ici.
	 * Les classes-filles appelleront simplement ces méthodes.
	 *
	 * Ces pages sont :
	 * 	- mise en situation
	 * 	- dessin d'ensemble
	 * 	- nomenclature
	 * 	- éclaté
	 * 	- les pages de type association image-fichier
	 * 	- les pages pur html
	 */

	/**
	 * Rendu des pages de mise en situation
	 *
	 * @param Response $reponse
	 *
	 * @return Response
	 */
    protected function renduMES(Response $reponse): Response {
		return $this->vue->render($reponse, '112-pageDT.html.twig', [
				'support'			=> $this->nom,
				'title'				=> "DT {$this->nom}",
				'logo_url'			=> "/supports/{$this->dossier}/images/{$this->logo}",
				'header'			=> "Dossier technique {$this->article_du}{$this->nom}",
				'du'				=> $this->article_du,
				'dossier'			=> $this->dossier,
				'contenu'			=> 'mise-en-situation',
				'menu'				=> '<p>en construction</p>',
  		]);
	}
}
