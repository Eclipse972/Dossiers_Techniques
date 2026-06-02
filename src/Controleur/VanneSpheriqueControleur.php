<?php
/**
 * Contrôleur de la vanne sphérique
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class VanneSpheriqueControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support vanne sphérique.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('vanne sphérique', "de la ", 'vanne-spherique', 'vanne.png');
    }

    /**
     * Affiche la page 'à propos'
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
			'vanne-spherique.zip',
			["Ajout d'une contrainte limite pour simuler les fins de course angulaire du levier."],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation
     *
     * @route /vanne-spherique/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de la vanne sphérique.
     *
     * @route /vanne-spherique/dessin-densemble
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
     * Affiche la page de nomenclature de la vanne sphérique.
     *
     * @route /vanne-spherique/nomenclature
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function nomenclature(Request $requete, Response $reponse): Response
    {
        return $reponse;
    }
}
