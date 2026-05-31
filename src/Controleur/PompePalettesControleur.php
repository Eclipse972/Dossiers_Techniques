<?php
/**
 * Contrôleur de la pompe à palettes
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class PompePalettesControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support pompe à palettes.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('pompe a palettes', "de la ", 'pompe-a-palettes', 'pompe.png');
    }

    /**
     * Affiche la page de mise en situation de la pompe à palettes.
     *
     * @route /pompe-a-palettes/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de la pompe à palettes.
     *
     * @route /pompe-a-palettes/dessin-densemble
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
     * Affiche la page de nomenclature de la pompe à palettes.
     *
     * @route /pompe-a-palettes/nomenclature
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
     * Affiche la page 'à propos' de la pompe à palettes (archive zip + description).
     *
     * @route /pompe-a-palettes/a-propos
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
