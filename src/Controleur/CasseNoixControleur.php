<?php
/**
 * Contrôleur du casse-noix
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

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
	 * Affiche la page 'à propos'
	 *
	 * @route /casse-noix
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function aPropos(Request $requete, Response $reponse): Response {
		return $this->renduApropos(
			$reponse,
			'casse-noix.zip',
			[],
			[]
		);
	}

	/**
	 * Affiche la page de mise en situation
	 *
	 * @route /casse-noix/mise-en-situation
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function miseEnSituation(Request $requete, Response $reponse): Response
	{
		return $this->renduMES($reponse);
	}

	/**
	 * Affiche la page du diagramme A-0
	 *
	 * @route /casse-noix/diagramme-A-0
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function diagrammeA0(Request $requete, Response $reponse): Response
	{
		return $this->renduPageImage(
			$reponse,
			"Diagramme A-0",
			"",
			'diagrammeA0.png',
			"diagramme A-0 du casse-noix",
			"",
			700
		);
	}

	/**
	 * Affiche la page du dessin d'ensemble
	 *
	 * @route /casse-noix/dessin-densemble
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDensemble(Request $requete, Response $reponse): Response
	{
		return $this->renduDessinDensemble($reponse);
	}

	/**
	 * Affiche la page de l'éclaté
	 *
	 * @route /casse-noix/eclate
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function eclate(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'casse-noix', 'eclate-casse-noix');
	}

	/**
	 * Affiche la page de nomenclature du casse-noix.
	 *
	 * @route /casse_noix/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'colonne',							2,	'colonne.EPRT',			'S 275');
		Nomenclature::ajouterLigne(2,	'levier',							1,	'levier.EPRT',			'stub');
		Nomenclature::ajouterLigne(3,	'embout',							1,	'embout.EPRT',			'Cu Zn 39 Pb 2');
		Nomenclature::ajouterLigne(4,	'excentrique',						1,	'excentrique.EPRT',		'Cu Zn 39 Pb 2');
		Nomenclature::ajouterLigne(5,	'piston',							1,	'piston.EPRT',			'S 275');
		Nomenclature::ajouterLigne(6,	'coupelle',							1,	'coupelle.EPRT',		'EN AW 2017');
		Nomenclature::ajouterLigne(7,	'réhausse',							1,	'rehausse.EPRT',		'EN AW 2017');
		Nomenclature::ajouterLigne(8,	'bague',							1,	'bague.EPRT',			'Cu Zn 39 Pb 2',	'monté serré dans le bloc coulisse');
		Nomenclature::ajouterLigne(9,	'bloc coulisse',					1,	'bloc_coulisse.EPRT',	'EN AW 2017');
		Nomenclature::ajouterLigne(10,	'bloc pivot',						2,	'bloc_pivot.EPRT',		'EN AW 2017');
		Nomenclature::ajouterLigne(11,	'socle',							1,	'socle.EPRT',			'hêtre');
		Nomenclature::ajouterLigne(12,	'goupille 6x26',					1,	'goupille.EPRT',		'',					'montée serrée dans le bloc pivot');
		Nomenclature::ajouterLigne(13,	'vis CHc M5-16',					2,	'vis.EPRT');
		Nomenclature::ajouterLigne(14,	'écrou H M6',						2,	'ecrou.EPRT');
		Nomenclature::ajouterLigne(15,	'rondelle ',						2,	'rondelle.EPRT');
		Nomenclature::ajouterLigne(16,	'ressort dint=16, 10 spires',		1,	'ressort.EPRT');
		Nomenclature::ajouterLigne(17,	'Vis sans tête HC à bout plat M5 - 6',	2,	'visSANStete.EPRT');
		Nomenclature::ajouterLigne(18,	'plaquette support',				1,	'plaquette.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}
}
