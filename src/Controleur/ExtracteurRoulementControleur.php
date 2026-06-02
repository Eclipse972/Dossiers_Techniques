<?php
/**
 * Contrôleur de l' extracteur de roulement
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class ExtracteurRoulementControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support extracteur de roulement.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('extracteur de roulement', "de l'", 'extracteur-de-roulement', 'extracteur.png');
    }

    /**
     * Affiche la page 'à propos'
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
			'extracteur_de_roulement.zip',
			[],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation de l' extracteur de roulement.
     *
     * @route /extracteur-de-roulement/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de l' extracteur de roulement.
     *
     * @route /extracteur-de-roulement/dessin-densemble
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
     * Affiche la page de nomenclature de l' extracteur de roulement.
     *
     * @route /extracteur-de-roulement/nomenclature
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
