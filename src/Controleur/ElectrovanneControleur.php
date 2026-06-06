<?php
/**
 * Contrôleur de l'électrovanne
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class ElectrovanneControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support électrovanne.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('électrovanne', "de l'", 'electrovanne', 'electrovanne.png');
    }

    /**
     * Affiche la page 'à propos'
     *
     * @route /electrovanne
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
    	$listeLien = [];
		self::ajouteLien($listeLien,'http://laparrej.free.fr/pro_sw.htm#e', "site de Jérôme Laparre");
        return $this->renduApropos(
			$reponse,
			'electrovanne.zip',
			[
				"une des configurations est un écorché",
				"la maquette est fixe",
				"contient les dessins de définition"
			],
			$listeLien
		);
    }

    /**
     * Affiche la page de mise en situation de l'électrovanne.
     *
     * @route /electrovanne/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de l'électrovanne.
     *
     * @route /electrovanne/dessin-densemble
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
	 * Affiche la page de nomenclature de l'électrovanne.
	 *
	 * @route /electrovanne/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Corps',			1,	'corps.EPRT');
		Nomenclature::ajouterLigne(2,	'Membrane',			1,	'membrane.EPRT');
		Nomenclature::ajouterLigne(3,	'Joint torique',	2,	'joint_torique.EPRT');
		Nomenclature::ajouterLigne(4,	'Noyau',			1,	'noyau.EPRT');
		Nomenclature::ajouterLigne(5,	'Ressort',			1,	'ressort.EPRT');
		Nomenclature::ajouterLigne(6,	'Support',			1,	'support.EPRT');
		Nomenclature::ajouterLigne(7,	'Axe guide',		1,	'axe_guide.EPRT');
		Nomenclature::ajouterLigne(8,	'Bobine',			1,	'bobine.EPRT');
		Nomenclature::ajouterLigne(9,	'Boitier',			1,	'boitier.EPRT');
		Nomenclature::ajouterLigne(10,	'Vis CHc M5-25',	1,	'vis.EPRT');
		Nomenclature::ajouterLigne(11,	'Écrou',			1,	'ecrou.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
	 * Affiche la page de fonctionnement
	 *
	 * @route /electrovanne/fonctionnement
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
	 * Affiche la page d'analyse fonctionnelle
	 *
	 * @route /electrovanne/analyse-fonctionnelle
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
}
