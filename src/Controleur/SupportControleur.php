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
	 * Hydratation du support
	 *
	 * Fonction que dois appeler chaque constructeur des classes-filles
	 * pour donner les caractéristiques de chaque support
	 *
	 * @param string $nom nom du support
	 * @param string $du article pour écrire par exemple dossier technique 'du' support
	 * @param string $dossier racine du dossier pour les images, fichiers et templates.
	 * ATTENTION: le dossier ne doit pas contenir d'espace
	 */
	abstract protected function hydrate(string $nom, string $du, string $dossier): void;

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

	// outils pour les classes-filles
    /*public function rendu_miseEnSituation(Response $reponse, string $template): Response {
		return $this->vue->render($reponse, $template, [
				'support'	=> $this->nom,
				'du'		=> $this->article_du,
				'dossier'	=> $this->dossier,
  		]);
	}*/
}
