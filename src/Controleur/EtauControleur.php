<?php
/**
 * Contrôleur de l'étau
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class EtauControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support étau.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('étau', "de l'", 'etau', 'etau.png');
    }

    /**
     * Affiche la page de mise en situation de l'étau.
     *
     * @route /etau/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de l'étau.
     *
     * @route /etau/dessin-densemble
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    protected function dessinDensemble(Request $requete, Response $reponse): Response
    {
        return $reponse;
    }

    /**
     * Affiche la page de nomenclature de l'étau.
     *
     * @route /etau/nomenclature
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    protected function nomenclature(Request $requete, Response $reponse): Response
    {
        return $reponse;
    }

    /**
     * Affiche la page 'à propos' de l'étau (archive zip + description).
     *
     * @route /etau
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    protected function aPropos(Request $requete, Response $reponse): Response
    {
        return $reponse;
    }
}
