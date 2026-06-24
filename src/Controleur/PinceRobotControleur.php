<?php
/**
 * Contrôleur de la pince de robot
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class PinceRobotControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support pince de robot.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('pince de robot', "de la ", 'pince-de-robot', 'pince.png');
    }

    /**
     * Affiche la page 'à propos'
     *
     * @route /pince-de-robot
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'pince-de-robot.zip',
			[
				"par défaut le corps est caché",
				"rajout d'une contrainte limite"
			],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation de la pince de robot.
     *
     * @route /pince-de-robot/mise-en-situation
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function miseEnSituation(Request $requete, Response $reponse): Response
    {
        return $this->renduPageMiseEnSituation($reponse);
    }

    /**
     * Affiche la page du dessin d'ensemble de la pince de robot.
     *
     * @route /pince-de-robot/dessin-densemble
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
	 * Affiche la page de nomenclature de la pince de robot.
	 *
	 * @route /pince-de-robot/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Corps',									1,	'corps.EASM');
		Nomenclature::ajouterLigne(2,	'Vis',										1,	'vis.EPRT');
		Nomenclature::ajouterLigne(3,	'Écrou',									1,	'ecrou.EPRT');
		Nomenclature::ajouterLigne(4,	'roulement à double rangée de billes',		1,	'roulement.EASM');
		Nomenclature::ajouterLigne(5,	'Levier',									2,	'levier.EPRT');
		Nomenclature::ajouterLigne(6,	'Doigt',									2,	'doigt.EPRT');
		Nomenclature::ajouterLigne(7,	'Grande biellette',							4,	'grande_biellette.EPRT');
		Nomenclature::ajouterLigne(8,	'Petite biellette',							2,	'petite_biellette.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
     * Affiche la page de fonctionnement de la pince de robot.
     *
     * @route /pince-de-robot/fonctionnement
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
     * Affiche la page de l'éclaté de la pince de robot.
     *
     * @route /pince-de-robot/eclate
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclate(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'pince-de-robot', 'eclate-pince-de-robot');
    }
}
