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
     * Affiche la page 'à propos'
     *
     * @route /pompe-a-palettes
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'pompe-a-palettes.zip',
			["contient une configuration pour les étapes de l'assemblage"],
			[]
		);
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
    public function dessinDensemble(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
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
    public function nomenclature(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }
}
