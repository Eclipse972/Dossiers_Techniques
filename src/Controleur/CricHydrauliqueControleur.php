<?php
/**
 * Contrôleur du cric hydraulique
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

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
     * Affiche la page 'à propos' du cric bouteille
     *
	 * @route /cric-hydraulique
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			null,
			[],
			[]
		);
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
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
	 * Affiche la page de nomenclature du cric hydraulique 2 tonnes.
	 *
	 * @route /cric_hydraulique/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Flasque gauche',						1,	'flasque_gauche.EASM');
		Nomenclature::ajouterLigne(2,	'Flasque droit',						1,	'flasque_droit.EASM');
		Nomenclature::ajouterLigne(3,	'Roulette directrice assemblée',		2,	'roulette_directrice.EASM');
		Nomenclature::ajouterLigne(4,	'Roue avant',							2,	'roue_avant.EPRT');
		Nomenclature::ajouterLigne(5,	'Axe roues avant',						2,	'axe_roues_avant.EPRT');
		Nomenclature::ajouterLigne(6,	'Axe pivot vérin',						2,	'axe_pivot_verin.EPRT');
		Nomenclature::ajouterLigne(7,	'Axe pivot bras de levage',				1,	'axe_pivot_bras_levage.EPRT');
		Nomenclature::ajouterLigne(8,	'Rondelle M12',							6,	'rondelleM12.EPRT');
		Nomenclature::ajouterLigne(9,	'Écrou hexagonal ISO 4032-M12',			6,	'ecrouM12.EPRT');
		Nomenclature::ajouterLigne(10,	'Tourillon',							2,	'.EPRT');
		Nomenclature::ajouterLigne(11,	'Anneau élastique pour arbre 10x1',		2,	'.EPRT');
		Nomenclature::ajouterLigne(12,	'Unité hydraulique',					1,	'.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
	 * Affiche la page de fonctionnement
	 *
	 * @route /cric-hydraulique/fonctionnement
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnement(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page de la montée
	 *
	 * @route /cric-hydraulique/fonctionnement/monte
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnementMonte(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page de la descente
	 *
	 * @route /cric-hydraulique/fonctionnement/descend
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnementDescend(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page des précautions d'utilisation
	 *
	 * @route /cric-hydraulique/fonctionnement/precautions
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnementPrecautions(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page d'analyse fonctionnelle
	 *
	 * @route /cric-hydraulique/analyse-fonctionnelle
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function analyseFonctionnelle(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du diagramme des intéracteurs
	 *
	 * @route /cric-hydraulique/analyse-fonctionnelle/pieuvre
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function AFpieuvre(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du FAST Levage du véhicule
	 *
	 * @route /cric-hydraulique/analyse-fonctionnelle/fast-evage
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function AFfastEvage(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du FAST Dépose du véhicule
	 *
	 * @route /cric-hydraulique/analyse-fonctionnelle/fast-depose
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function AFfastDepose(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page de l'éclaté
	 *
	 * @route /cric-hydraulique/eclate
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function eclate(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page d'entretien du cric
	 *
	 * @route /cric-hydraulique/entretien
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function entretien(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page de problème au levage
	 *
	 * @route /cric-hydraulique/entretien/probleme-levage
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function entretienProblemeLevage(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page de problème à la descente
	 *
	 * @route /cric-hydraulique/entretien/probleme-descente
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function entretienProblemeDescente(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}
}
