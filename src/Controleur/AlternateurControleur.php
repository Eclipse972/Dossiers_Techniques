<?php
/**
 * Contrôleur de l'alternateur
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class AlternateurControleur extends SupportControleur
{
	/**
	 * Constructeur : initialise le support Alternateur.
	 *
	 * @param Twig $vue Moteur de templates Twig
	 */
	public function __construct(Twig $vue)
	{
		parent::__construct($vue);
		$this->hydrate('alternateur', "de l'", 'alternateur', 'alternateur.png');
	}

	/**
	 * Affiche la page 'à propos' de l'alternateur
	 *
	 * @route /alternateur
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function aPropos(Request $requete, Response $reponse): Response {
		return $this->renduApropos(
			$reponse,
			'alternateur.zip',
			[
				'contient deux configurations complémentaires',
				"dessin de l'éclaté"
			],
			[]
		);
	}

	/**
	 * Affiche la page de mise en situation de l'alternateur.
	 *
	 * @route /alternateur/mise-en-situation
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function miseEnSituation(Request $requete, Response $reponse): Response
	{
		return $this->renduPageMiseEnSituation($reponse);
	}

	/**
	 * Affiche la page du dessin d'ensemble de l'alternateur.
	 *
	 * @route /alternateur/dessin-densemble
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDensemble(Request $requete, Response $reponse): Response
	{
		return $this->renduPageImage(
			$reponse,
			"dessin d'ensemble",
			"",
			'ensemble.png',
			"dessin de l'aternateur",
			"<p>Pas de fichier disponible.</p>"
		);
	}

	/**
	 * Affiche la page de l'éclaté
	 *
	 * @route /alternateur/eclate
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
			'eclate.png',
			"éclaté de l'aternateur",
			"<p>Pas de fichier disponible.</p>"
		);
	}

	/**
	 * Affiche la page de nomenclature de l'alternateur.
	 *
	 * @route /alternateur/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'carter gauche',						1,	'carter_gauche.EPRT');
		Nomenclature::ajouterLigne(3,	'carter droit',							1,	'carter_droit.EPRT',		'AU4-G');
		Nomenclature::ajouterLigne(4,	'rotor à griffes',						1,	'rotorAgriffes.EASM');
		Nomenclature::ajouterLigne(5,	'stator',								1,	'stator.EPRT');
		Nomenclature::ajouterLigne(6,	'arbre du rotor',						1,	'arbreDUrotor.EPRT');
		Nomenclature::ajouterLigne(10,	'rondelle',								1,	'rondelle.EPRT');
		Nomenclature::ajouterLigne(11,	'poulie pour courroie polyV',			1,	'poulie.EPRT');
		Nomenclature::ajouterLigne(12,	'écrou',								1,	'ecrou.EPRT');
		Nomenclature::ajouterLigne(15,	'vis ISO M5x85x26',						4,	'vis_ISO_M5x85x26.EPRT');
		Nomenclature::ajouterLigne(20,	'plaque support de roulement',			1,	'plaque.EPRT');
		Nomenclature::ajouterLigne(21,	'roulement ⌀int 17 ⌀ext 52 l:17 - 2RS',	1,	'roulement1.EPRT');
		Nomenclature::ajouterLigne(22,	'roulement 6202',						1,	'roulement2.EPRT');
		Nomenclature::ajouterLigne(23,	'bague de roulement',					1,	'bague2roulement.EPRT',		'téflon');
		Nomenclature::ajouterLigne(25,	'joint',								1,	'joint.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}
}
