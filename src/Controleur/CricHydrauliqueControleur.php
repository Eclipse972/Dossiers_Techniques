<?php
/**
 * Contrôleur du cric hydraulique
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class CricHydrauliqueControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support cric hydraulique.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('cric hydraulique', "du ", 'cric-hydraulique', 'cric.png');
    }

    /**
     * Affiche la page de mise en situation du cric hydraulique.
     *
     * @route /cric-hydraulique/mise-en-situation
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
     * Affiche la page du dessin d'ensemble du cric hydraulique.
     *
     * @route /cric-hydraulique/dessin-densemble
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
     * Affiche la page de nomenclature du cric hydraulique.
     *
     * @route /cric-hydraulique/nomenclature
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
     * Affiche la page 'à propos' du cric hydraulique (archive zip + description).
     *
     * @route /cric-hydraulique
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
