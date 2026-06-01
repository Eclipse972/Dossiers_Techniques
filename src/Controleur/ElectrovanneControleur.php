<?php
/**
 * Contrôleur de l'électrovanne
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class ElectrovanneControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support électrovanne.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('électrovanne', "de l'", 'electrovanne', 'electrovanne.png');
    }

    /**
     * Affiche la page de mise en situation de l'électrovanne.
     *
     * @route /electrovanne/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de l'électrovanne.
     *
     * @route /electrovanne/dessin-densemble
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
     * Affiche la page de nomenclature de l'électrovanne.
     *
     * @route /electrovanne/nomenclature
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
     * Affiche la page 'à propos' de l'électrovanne (archive zip + description).
     *
     * @route /electrovanne
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
