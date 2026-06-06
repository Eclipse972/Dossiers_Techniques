<?php
/**
 * Contrôleur de l'alternateur
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class Butee5axesControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support Alternateur.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('butée 5 axes', "de la ", 'butee-5-axes', 'butee.png');
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
			'butee-5-axes.zip',
			[
				"chaque axe fait l'objet d'une configuration dans le fichier Butée",
				"éclaté sur un fichier séparé",
				"contient les dessins de définition"
			],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation
     *
     * @route /butee-5-axes/mise-en-situation
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
     * Affiche la page du dessin d'ensemble
     *
     * @route /butee-5-axes/dessin-densemble
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function dessinDensemble(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

/**
	 * Affiche la page de nomenclature de la butée 5 axes.
	 *
	 * @route /butee5axes/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'socle',			1,	'socle.EPRT',			'EN AW 2017');
		Nomenclature::ajouterLigne(2,	'contre embase',	1,	'contreembase.EPRT',	'EN AW 2017');
		Nomenclature::ajouterLigne(3,	'module bis',		1,	'module.EPRT',			'EN AW 2017');
		Nomenclature::ajouterLigne(4,	'axe',				1,	'axe4.EPRT',			'EN AW 2017');
		Nomenclature::ajouterLigne(5,	'vis CHc M4 - 55',	1,	'vis4x55.EPRT',			'EN AW 2017');
		Nomenclature::ajouterLigne(6,	'embase',			1,	'embase.EPRT',			'EN AW 2017',	'commerce');
		Nomenclature::ajouterLigne(7,	'intermédiaire',	1,	'intermediaire.EPRT',	'EN AW 2017');
		Nomenclature::ajouterLigne(8,	'bouton',			1,	'bouton.EPRT',			'EN AW 2017');
		Nomenclature::ajouterLigne(9,	'tige filetée',		1,	'tige_filetee.EPRT',	'EN AW 2017',	'commerce');
		Nomenclature::ajouterLigne(10,	'axe',				1,	'axe10.EPRT',			'EN AW 2017');
		Nomenclature::ajouterLigne(11,	'embout',			1,	'embout.EPRT',			'EN AW 2017');
		Nomenclature::ajouterLigne(12,	'tige',				1,	'tige.EPRT',			'EN AW 2017');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}
	/**
     * Affiche la page de présentation des axes
     *
     * @route /butee-5-axes/axes
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     *
     * @return Response
     */
    public function axes(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'axe 1
     *
     * @route /butee-5-axes/axes/axe1
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     *
     * @return Response
     */
    public function axe1(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'axe 2
     *
     * @route /butee-5-axes/axes/axe2
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     *
     * @return Response
     */
    public function axe2(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'axe 3
     *
     * @route /butee-5-axes/axes/axe3
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     *
     * @return Response
     */
    public function axe3(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'axe 4
     *
     * @route /butee-5-axes/axes/axe4
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     *
     * @return Response
     */
    public function axe4(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'axe 5
     *
     * @route /butee-5-axes/axes/axe5
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     *
     * @return Response
     */
    public function axe5(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'éclaté
     *
     * @route /butee-5-axes/eclate
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
     * Affiche la page des dessins de définition
     *
     * @route /butee-5-axes/dessin-definition
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     *
     * @return Response
     */
    public function dessinDefinition(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page du dessin de définition du socle
     *
     * @route /butee-5-axes/dessin-definition/socle
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     *
     * @return Response
     */
    public function dessinDefinitionSocle(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page du dessin de définition de la contre-embase
     *
     * @route /butee-5-axes/dessin-definition/contre-embase
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     *
     * @return Response
     */
    public function dessinDefinitionContreEmbase(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }
}
