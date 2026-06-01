<?php
/**
 * Contrôleur de la pince de robot
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class PinceRobotControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support pince de robot.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('pince de robot', "de la ", 'pince-de-robot', 'pince.png');
    }

    /**
     * Affiche la page de mise en situation de la pince de robot.
     *
     * @route /pince-de-robot/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de la pince de robot.
     *
     * @route /pince-de-robot/dessin-densemble
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function dessinDensemble(Request $requete, Response $reponse): Response
    {
        return $reponse;
    }

    /**
     * Affiche la page de nomenclature de la pince de robot.
     *
     * @route /pince-de-robot/nomenclature
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function nomenclature(Request $requete, Response $reponse): Response
    {
        return $reponse;
    }

    /**
     * Affiche la page 'à propos' de la pince de robot (archive zip + description).
     *
     * @route /pince-de-robot
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response
    {
        return $reponse;
    }
}
