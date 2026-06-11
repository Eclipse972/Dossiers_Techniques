<?php
/**
 * Contrôleur de l'étau
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class EtauControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support étau.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('étau', "de l'", 'etau', 'etau.png');
    }

    /**
     * Affiche la page 'à propos'
     *
     * @route /etau
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
			'etau.zip',
			["maquette construite à partir des classes d'équivalence"],
			$listeLien
		);
    }

    /**
     * Affiche la page de mise en situation de l'étau.
     *
     * @route /etau/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de l'étau.
     *
     * @route /etau/dessin-densemble
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
	 * Affiche la page de nomenclature de l'étau de modélisme.
	 *
	 * @route /etau/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Mors mobile',					1,	'mors-mobile.EPRT');
		Nomenclature::ajouterLigne(2,	'Mors fixe',					1,	'mors-fixe.EPRT');
		Nomenclature::ajouterLigne(3,	'Garniture de mors mobile',		1,	'garniture-mors-mobile.EPRT');
		Nomenclature::ajouterLigne(4,	'Vis FS M5-20 5-6',				4,	'vis_FS_M5-20.EPRT');
		Nomenclature::ajouterLigne(5,	'Garniture de mors fixe',		1,	'garniture-mors-fixe.EPRT');
		Nomenclature::ajouterLigne(6,	'Vis de manoeuvre',				1,	'vis2manoeuvre.EPRT');
		Nomenclature::ajouterLigne(7,	'Écrou H M12-8',				1,	'ecrou-H-M12.EPRT');
		Nomenclature::ajouterLigne(8,	'Bague de renfort',				1,	'bague2renfort.EPRT');
		Nomenclature::ajouterLigne(9,	'Tige de poignée',				1,	'tige2poignee.EPRT');
		Nomenclature::ajouterLigne(10,	'Semelle',						1,	'semelle.EPRT');
		Nomenclature::ajouterLigne(11,	'Vis CHc M5-10 - 8.8',			2,	'vis_CHC_M5-10.EPRT');
		Nomenclature::ajouterLigne(12,	'Tige guide',					2,	'tige_guide.EPRT');
		Nomenclature::ajouterLigne(13,	'Vis sans tête HC M4-6',		2,	'vis_HC_M4-6.EPRT');
		Nomenclature::ajouterLigne(14,	'Goupille élastique',			1,	'goupille_elastique_3x16.EPRT');
		Nomenclature::ajouterLigne(15,	'Embout de tige de poignée',	2,	'embout2poignee.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
	 * Affiche la page de fonctionnement
	 *
	 * @route /etau/fonctionnement
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnement(Request $requete, Response $reponse): Response
	{
		return $this->renduFonctionnement($reponse);
	}

	/**
	 * Affiche la page de l'éclaté
	 *
	 * @route /etau/eclate
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function eclate(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'etau', 'eclate-etau');
	}

	/**
	 * Affiche la page des classes d'équivalence
	 *
	 * @route /etau/classe-equivalence
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function classeEquivalence(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page de la classe d'équivalence du mors fixe
	 *
	 * @route /etau/classe-equivalence/mors-fixe
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function CEmorsFixe(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'CE_mors_fixe', 'CE_mors_fixe', "Classe d'équivalence mors fixe");
	}

	/**
	 * Affiche la page de la classe d'équivalence du mors mobile
	 *
	 * @route /etau/classe-equivalence/mors-mobile
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function CEmorsMobile(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'CE_mors_mobile', 'CE_mors_mobile', "Classe d'équivalence mors mobile");
	}

	/**
	 * Affiche la page de la classe d'équivalence de la vis de manoeuvre
	 *
	 * @route /etau/classe-equivalence/vis
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function CEvis(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page de la classe d'équivalence de la tige
	 *
	 * @route /etau/classe-equivalence/tige
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function CEtige(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}
}
