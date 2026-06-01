<?php
/**
 * Contrôleur du casse-noix
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class CasseNoixControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support casse-noix.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('casse-noix', "du ", 'casse-noix', 'casseNoix.png');
    }

    /**
     * Affiche la page de mise en situation du casse-noix.
     *
     * @route /casse-noix/mise-en-situation
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
     * Affiche la page du dessin d'ensemble du casse-noix.
     *
     * @route /casse-noix/dessin-densemble
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
     * Affiche la page de nomenclature du casse-noix.
     *
     * @route /casse-noix/nomenclature
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
     * Affiche la page 'à propos' du casse-noix (archive zip + description).
     *
     * @route /casse-noix
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
