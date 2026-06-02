<?php
/**
 * Contrôleur du cric bouteille
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class CricBouteilleControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support cric bouteille.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('cric bouteille', "du ", 'cric-bouteille', 'cric.png');
    }

    /**
     * Affiche la page 'à propos' du cric bouteille
     *
     * @route /bouton-pousssoir
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'cric-bouteille.zip',
			[
				"le fichier s'apelle Assemblage2",
				"la maquette est mobile",
				"pas de simulation des clapets"
			],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation du cric bouteille.
     *
     * @route /cric-bouteille/mise-en-situation
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
     * Affiche la page du dessin d'ensemble du cric bouteille.
     *
     * @route /cric-bouteille/dessin-densemble
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
     * Affiche la page de nomenclature du cric bouteille.
     *
     * @route /cric-bouteille/nomenclature
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
