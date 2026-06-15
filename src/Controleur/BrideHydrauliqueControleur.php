<?php
/**
 * Contrôleur de l'alternateur
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class BrideHydrauliqueControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support Alternateur.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('bride hydraulique', "de la ", 'bride-hydraulique', 'bride.png');
    }

	/**
     * Affiche la page 'à propos' de la bride hydraulique
     *
     * @route /bride-hydraulique
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
			[],
		);
    }

    /**
     * Affiche la page de mise en situation de la bride hydrauique.
     *
     * @route /bride-hydraulique/mise-en-situation
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function miseEnSituation(Request $requete, Response $reponse): Response
    {
        return $this->renduPageOrdinaire($reponse, 'mise-en-situation');
    }

    /**
     * Affiche la page du dessin d'ensemble de l'alternateur.
     *
     * @route /bride-hydraulique/dessin-densemble
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
	 * Affiche la page de nomenclature de la bride hydraulique.
	 *
	 * @route /bride-hydraulique/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'corps',											1,	'corps.EPRT',			'EN-GJS-600-2');
		Nomenclature::ajouterLigne(2,	'écrou H M10',										1,	'ecrou_H_M10.EPRT');
		Nomenclature::ajouterLigne(3,	'vis sans tête fendue à bout téton M10',			1,	'vis_sans_teteM10.EPRT');
		Nomenclature::ajouterLigne(4,	'levier',											1,	'levier.EPRT',			'S 235 (E24)');
		Nomenclature::ajouterLigne(5,	'axe de levier',									1,	'axe2levier.EPRT',		'S 235 (E24)');
		Nomenclature::ajouterLigne(6,	'chape',											1,	'chape.EPRT');
		Nomenclature::ajouterLigne(7,	'vis de la chape',									1,	'vis-chape.EPRT');
		Nomenclature::ajouterLigne(8,	'couvercle',										1,	'couvercle.EPRT',		'S 235 (E24)');
		Nomenclature::ajouterLigne(10,	'piston',											1,	'piston.EPRT',			'S 235 (E24)');
		Nomenclature::ajouterLigne(11,	'joint torique',									1,	'joint.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
     * Affiche la page de fonctionnement de la bride hydraulique.
     *
	 * @route bride-hydraulique/fonctionnement
	 *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function fonctionnement(Request $requete, Response $reponse): Response
    {
        return $this->renduPageOrdinaire($reponse, 'fonctionnement');
    }
}
