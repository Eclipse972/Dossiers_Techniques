<?php
/**
 * Contrôleur du moteur de modélisme
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class MoteurModelismeControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support moteur de modélisme.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('moteur de modelisme', "du ", 'moteur-de-modelisme', 'moteur.png');
    }

    /**
     * Affiche la page de mise en situation du moteur de modélisme.
     *
     * @route /moteur-de-modelisme/mise-en-situation
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
     * Affiche la page du dessin d'ensemble du moteur de modélisme.
     *
     * @route /moteur-de-modelisme/dessin-densemble
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
     * Affiche la page de nomenclature du moteur de modélisme.
     *
     * @route /moteur-de-modelisme/nomenclature
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
     * Affiche la page 'à propos' du moteur de modélisme (archive zip + description).
     *
     * @route /moteur-de-modelisme/a-propos
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
