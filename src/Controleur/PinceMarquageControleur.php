<?php
/**
 * Contrôleur de la pince de marquage
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class PinceMarquageControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support pince de marquage.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('pince de marquage', "de la ", 'pince-de-marquage', 'pince.png');
    }

    /**
     * Affiche la page 'à propos'
     *
     * @route /pince-de-marquage
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'pince-de-marquage.zip',
			[
				"les rouleaux ne roulent pas correctement sur la came",
				"dessin d'ensemble absent"
			],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation de la pince de marquage.
     *
     * @route /pince-de-marquage/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de la pince de marquage.
     *
     * @route /pince-de-marquage/dessin-densemble
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
     * Affiche la page de nomenclature de la pince de marquage.
     *
     * @route /pince-de-marquage/nomenclature
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function nomenclature(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

	/**
     * Affiche la page de fonctionnement de la pince de marquage.
     *
     * @route /pince-de-marquage/fonctionnement
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function fonctionnement(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'éclaté de la pince de marquage.
     *
     * @route /pince-de-marquage/eclate
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclate(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page principale des sous-ensembles.
     *
     * @route /pince-de-marquage/sous-ensembles
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function sousEnsembles(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche le sous-ensemble du bâti.
     *
     * @route /pince-de-marquage/sous-ensembles/bati
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function SEbati(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche le sous-ensemble du bras supérieur.
     *
     * @route /pince-de-marquage/sous-ensembles/bras-superieur
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function SEbrasSuperieur(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche le sous-ensemble du bras inférieur.
     *
     * @route /pince-de-marquage/sous-ensembles/bras-inferieur
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function SEbrasInferieur(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche le sous-ensemble du piston.
     *
     * @route /pince-de-marquage/sous-ensembles/piston
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function SEpiston(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }
}
