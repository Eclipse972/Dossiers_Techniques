<?php
/**
 * Contrôleur de la pince de marquage
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

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
        return $this->renduPageOrdinaire($reponse, 'mise-en-situation.html.twig');
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
        return $this->renduDessinDensemble($reponse);
    }

    /**
	 * Affiche la page de nomenclature de la pince de marquage.
	 *
	 * @route /pince-de-marquage/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Support de vérin',			1,	'support2verin.EPRT');
		Nomenclature::ajouterLigne(2,	'Fond',						1,	'fond.EPRT');
		Nomenclature::ajouterLigne(3,	'Plaque avant',				1,	'plaque_avant.EPRT');
		Nomenclature::ajouterLigne(4,	'Goupile ISO 87-34-5x16-A',	4,	'goupille.EPRT');
		Nomenclature::ajouterLigne(5,	'Tôle de protection',		1,	'tole2protection.EPRT');
		Nomenclature::ajouterLigne(6,	'Vis épaulée M5x40 NF E 27-191', 2, 'vis_epauleeM5x40.EPRT');
		Nomenclature::ajouterLigne(7,	'Entretoise',				4,	'entretoise.EPRT');
		Nomenclature::ajouterLigne(8,	'Bras supérieur',			1,	'bras_superieur.EPRT');
		Nomenclature::ajouterLigne(9,	'Bras inférieur',			1,	'bras_inferieur.EPRT');
		Nomenclature::ajouterLigne(10,	'Carter supérieur',			1,	'carter_superieur.EPRT');
		Nomenclature::ajouterLigne(11,	'Carter inférieur',			1,	'carter_inferieur.EPRT');
		Nomenclature::ajouterLigne(12,	'Corps vérin PES 32 P NA 254', 1, 'corps_verin.EPRT');
		Nomenclature::ajouterLigne(13,	'Piston PES 32 NA 25 DM4',	1,	'piston.EASM');
		Nomenclature::ajouterLigne(14,	'Came',						1,	'came.EPRT');
		Nomenclature::ajouterLigne(15,	'Axe',						1,	'axe.EPRT');
		Nomenclature::ajouterLigne(16,	'Entretoise ep. 1.8',		1,	'entretoise_ep1.8.EPRT');
		Nomenclature::ajouterLigne(17,	'Enclume',					1,	'enclume.EPRT');
		Nomenclature::ajouterLigne(18,	'Plaque d\'appui',			1,	'plaque_dappui.EPRT');
		Nomenclature::ajouterLigne(19,	'Poinçon',					1,	'poincon.EPRT');
		Nomenclature::ajouterLigne(20,	'Roulement SNR 624EE',		1,	'roulement.EASM');
		Nomenclature::ajouterLigne(21,	'Vis FHC NF E 27-160M3X0,5-8-8.8', 13, 'visFHC.EPRT');
		Nomenclature::ajouterLigne(22,	'Vis CZX NF E25-11 M3-0,5-10-4,8-1', 8, 'visCZX.EPRT');
		Nomenclature::ajouterLigne(23,	'Vis sans tête à bout plat NF E-27-180 M3x0,5-8-3,3h', 1, 'vis_sans_tete.EPRT');
		Nomenclature::ajouterLigne(24,	'Vis ISO 4762-M5x16-8.8',	8,	'visISO.EPRT');
		Nomenclature::ajouterLigne(25,	'Ressort de rappel',		1,	'ressort.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
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
        return $this->renduPageOrdinaire($reponse, 'fonctionnement.html.twig');
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
        return $this->renduEclate($reponse, 'pince-de-marquage', 'eclate-pince-de-marquage');
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
        return $this->renduEclate($reponse, 'pince', 'eclateSE', 'Les sous-ensembles');
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
        return $this->renduEclate($reponse, 'SE_bati', 'SE_bati', 'Sous-ensemble bâti');
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
        return $this->renduEclate($reponse, 'SE_bras_superieur', 'SE_bras_superieur', 'Sous-ensemble bras supérieur');
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
        return $this->renduEclate($reponse, 'SE_bras_inferieur', 'SE_bras_inferieur', 'Sous-ensemble bras inférieur');
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
        return $this->renduEclate($reponse, 'SE_piston', 'SE_piston', 'Sous-ensemble piston');
    }
}
