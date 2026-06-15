<?php
/**
 * Contrôleur du cric rouleur
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class CricRouleurControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support cric rouleur.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('cric rouleur', "du ", 'cric-rouleur', 'cric.png');
    }

    /**
     * Affiche la page 'à propos' du cric bouteille
     *
	 * @route /cric-rouleur
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
     * Affiche la page de mise en situation du cric rouleur.
     *
     * @route /cric-rouleur/mise-en-situation
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function miseEnSituation(Request $requete, Response $reponse): Response
    {
        return $this->renduPageOrdinaire($reponse, 'mise-en-situation.html.twig');
    }

    /**
     * Affiche la page du dessin d'ensemble du cric rouleur.
     *
     * @route /cric-rouleur/dessin-densemble
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
	 * Affiche la page de nomenclature du cric rouleur 2 tonnes.
	 *
	 * @route /cric-rouleur/nomenclature
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
	 * @route /cric-rouleur/fonctionnement
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnement(Request $requete, Response $reponse): Response
	{
		return $this->renduPageOrdinaire($reponse, 'fonctionnement.html.twig');
	}

	/**
	 * Affiche la page de la montée
	 *
	 * @route /cric-rouleur/fonctionnement/monte
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
	 * @route /cric-rouleur/fonctionnement/descend
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
	 * @route /cric-rouleur/fonctionnement/precautions
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
	 * @route /cric-rouleur/analyse-fonctionnelle
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
	 * @route /cric-rouleur/analyse-fonctionnelle/pieuvre
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function AFpieuvre(Request $requete, Response $reponse): Response
	{
		$texte="
			<p><b>FP1: l'utilisateur doit pouvoir lever son véhicule</p>
			<p><b>FP2: l'utilisateur doit pouvoir déposer son véhicule</p>
			<p><b>Fc1: Le cric doit pouvoir soulever un véhicule de 2 tonnes</p>
			<p><b>Fc2: Le cric doit suffisamment soulever le véhicule</p>
			<p><b>Fc3: Le cric doit facilement se positionner</p>
			<p><b>Fc4: Le cric doit s'adapter à des hauteurs de châssis différentes</p>
			<p><b>Fc5: Le cric doit résister à son milieu</p>
			<p><b>Fc6: Le cric doit &ecirc;tre transportable</p>";

		return $this->renduPageImage(
			$reponse,
			"Diagramme des intéracteurs",
			"",
			'pieuvre.png',
			"pieuvre du cric rouleur",
			$texte,
			400
		);
	}

	/**
	 * Affiche la page du FAST Levage du véhicule
	 *
	 * @route /cric-rouleur/analyse-fonctionnelle/fast-evage
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function AFfastEvage(Request $requete, Response $reponse): Response
	{
		return $this->renduPageImage(
			$reponse,
			'FAST "Levage du véhicule"',
			"",
			'fast_levage.png',
			"FAST levage du véhicule",
			"",
			700
		);
	}

	/**
	 * Affiche la page du FAST Dépose du véhicule
	 *
	 * @route /cric-rouleur/analyse-fonctionnelle/fast-depose
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function AFfastDepose(Request $requete, Response $reponse): Response
	{
		return $this->renduPageImage(
			$reponse,
			'FAST "Dépose du véhicule"',
			"",
			'fast_depose.png',
			"FAST dépose du véhicule",
			"",
			700
		);
	}

	/**
	 * Affiche la page de l'éclaté
	 *
	 * @route /cric-rouleur/eclate
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function eclate(Request $requete, Response $reponse): Response
	{
		return $this->renduPageImage(
			$reponse,
			"Éclaté",
			"",
			'cric_hydrau_eclate.png',
			"éclaté du cric rouleur",
			"",
			700
		);
	}

	/**
	 * Affiche la page d'entretien du cric
	 *
	 * @route /cric-rouleur/entretien
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
	 * @route /cric-rouleur/entretien/probleme-levage
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
	 * @route /cric-rouleur/entretien/probleme-descente
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
