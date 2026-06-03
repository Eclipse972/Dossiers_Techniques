<?php
/**
 * Contrôleur du préhenseur de culasse
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class PrehenseurCulasseControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support préhenseur de culasse.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('prehenseur de culasse', "du ", 'prehenseur-de-culasse', 'prehenseur.png');
    }

    /**
     * Affiche la page 'à propos' du bouton poussoir
     *
     * @route /prehenseur-de-culasse
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'prehenseur-de-culasse.zip',
			[
				"plusieurs fichiers au lieu d'utiliser des configurations",
				"le fichier préhenseur pour étude d'ouverture permet de voir le fonctionnement",
			],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation du préhenseur de culasse.
     *
     * @route /prehenseur-de-culasse/mise-en-situation
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function miseEnSituation(Request $requete, Response $reponse): Response
    {
        return $this->renduMES($reponse);
    }

    /**
     * Affiche la page du dessin d'ensemble du préhenseur de culasse.
     *
     * @route /prehenseur-de-culasse/dessin-densemble
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function dessinDensemble(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de nomenclature du préhenseur de culasse.
     *
     * @route /prehenseur-de-culasse/nomenclature
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function nomenclature(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }
}
