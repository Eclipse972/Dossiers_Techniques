<?php
/**
 * Contrôleur de la pompe à palettes
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class PompePalettesControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support pompe à palettes.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('pompe a palettes', "de la ", 'pompe-a-palettes', 'pompe.png');
    }

    /**
     * Affiche la page 'à propos'
     *
     * @route /pompe-a-palettes
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'pompe-a-palettes.zip',
			["contient une configuration pour les étapes de l'assemblage"],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation de la pompe à palettes.
     *
     * @route /pompe-a-palettes/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de la pompe à palettes.
     *
     * @route /pompe-a-palettes/dessin-densemble
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function dessinDensemble(Request $requete, Response $reponse): Response
    {
        return $this->renduDessinDensemble($reponse);
    }

    /**
	 * Affiche la page de nomenclature de la pompe à palettes.
	 *
	 * @route /pompe-a-palettes/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Corps',									1,	'corps.EPRT');
		Nomenclature::ajouterLigne(2,	'Coussinet à collerette',					1,	'Coussinet.EPRT');
		Nomenclature::ajouterLigne(3,	'Arbre',									1,	'arbre.EPRT');
		Nomenclature::ajouterLigne(4,	'Anneau élastique pour arbre 16x1',			1,	'Anneau_elastique.EPRT');
		Nomenclature::ajouterLigne(5,	'Embout de tube 3/8e',						2,	'Embout_tube.EPRT');
		Nomenclature::ajouterLigne(6,	'Palette',									2,	'Palette.EPRT');
		Nomenclature::ajouterLigne(7,	'Joint torique 50.40x3.53',					1,	'joint_torique.EPRT');
		Nomenclature::ajouterLigne(8,	'Plaque',									1,	'plaque.EPRT');
		Nomenclature::ajouterLigne(9,	'Vis ISO 10642-m3X12-8.8',					8,	'Vis.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
     * Affiche la page de l'éclaté de la pompe à palettes.
     *
     * @route /pompe-a-palettes/eclate
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclate(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'pompe-a-palettes', 'eclate-pompe-a-palettes');
    }
}
