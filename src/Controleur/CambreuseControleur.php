<?php
/**
 * Contrôleur de l'alternateur
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class CambreuseControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support Alternateur.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('cambreuse', "de la ", 'cambreuse', 'cambreuse.png');
    }

	/**
     * Affiche la page 'à propos'
     *
     * @route /cambreuse
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'cambreuse.zip',
			[],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation de l'alternateur.
     *
     * @route /cambreuse/mise-en-situation
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
     * @route /cambreuse/dessin-densemble
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
	 * Affiche la page de nomenclature de la cambreuse.
	 *
	 * @route /cambreuse/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Table',									1,	'Table.EPRT',					'',			'non représentée');
		Nomenclature::ajouterLigne(2,	'Corps de vérin ISO 6431 63X50',			1,	'corps2verin.EASM');
		Nomenclature::ajouterLigne(3,	'Corps de vérin ISO 6431 80X50',			1,	'corps2verin2.EASM');
		Nomenclature::ajouterLigne(4,	'Tige de vérin ISO 6431 63X50',				1,	'tige2verin.EASM');
		Nomenclature::ajouterLigne(5,	'Tige de vérin ISO 6431 80X50',				1,	'tige2verin2.EASM');
		Nomenclature::ajouterLigne(6,	'Vis H M8x65',								1,	'visHM8x65.EPRT',				'',			'NF EN ISO 4017');
		Nomenclature::ajouterLigne(7,	'Basculeur usiné',							1,	'basculeur.EPRT',				'EN AW 2017');
		Nomenclature::ajouterLigne(8,	'Axe de bielle',							1,	'axe2bielle.EPRT',				'C 40');
		Nomenclature::ajouterLigne(9,	'Coussinet 12-18x12',						2,	'coussinet12-18x12.EPRT',		'CW 453K',	'ISO 2795');
		Nomenclature::ajouterLigne(10,	'Bielle',									1,	'bielle.EPRT',					'E 335');
		Nomenclature::ajouterLigne(11,	'Coussinet 12-18x16',						3,	'coussinet12-18x16.EPRT',		'CW 453K',	'ISO 2795');
		Nomenclature::ajouterLigne(12,	'Coussinet 16-22x16',						1,	'coussinet16-22x16.EPRT',		'CW 453K',	'ISO 2795');
		Nomenclature::ajouterLigne(13,	'Chape',									1,	'chape.EPRT',					'S 235 (E24)');
		Nomenclature::ajouterLigne(14,	'Axe de chape',								1,	'Axe2chape.EPRT',				'C 40');
		Nomenclature::ajouterLigne(15,	'Butée',									1,	'butee.EPRT',					'S 235 (E24)');
		Nomenclature::ajouterLigne(16,	'Bride de blocage',							1,	'Bride2blocage.EPRT',			'C 40',		'Trempé');
		Nomenclature::ajouterLigne(17,	'Bride',									1,	'Bride.EPRT',					'C 40');
		Nomenclature::ajouterLigne(18,	'Flasque',									2,	'Flasque.EPRT',					'EN AW 2017');
		Nomenclature::ajouterLigne(19,	'Plaque de support de vérin de cambrage',	1,	'Plaque_cambrage.EPRT');
		Nomenclature::ajouterLigne(20,	'Plaque de support de vérin de bridage',	1,	'Plaque_bridage.EPRT');
		Nomenclature::ajouterLigne(21,	'Cale',										1,	'Cale.EPRT',					'EN AW 2017');
		Nomenclature::ajouterLigne(22,	'Support de fixation',						4,	'Support2fixation.EPRT',		'S 235 (E24)');
		Nomenclature::ajouterLigne(23,	'Bride d\'arbre',							4,	'Bride_darbre.EPRT',			'S 235 (E24)');
		Nomenclature::ajouterLigne(24,	'Tige de guidage',							2,	'Tige2guidage.EPRT');
		Nomenclature::ajouterLigne(25,	'Plaque support de posoir',					1,	'Plaque_support2posoir.EPRT',	'S 235 (E24)');
		Nomenclature::ajouterLigne(26,	'Support de vis d\'arrêt',					1,	'Support2vis_darret.EPRT',		'S 235 (E24)');
		Nomenclature::ajouterLigne(27,	'Support d\'axe d\'équerre',				2,	'Support_daxe_dequerre.EPRT');
		Nomenclature::ajouterLigne(28,	'Axe d\'équerre',							2,	'Axe_dequerre.EPRT');
		Nomenclature::ajouterLigne(29,	'Écrou H M8',								1,	'EcrouHM8.EPRT',				'',			'ISO EN 4032');
		Nomenclature::ajouterLigne(30,	'Vis CHC M6-16-14',							20,	'CHCM6-16-14.EPRT');
		Nomenclature::ajouterLigne(31,	'Vis CHC M8-16-14',							16,	'CHCM8-16-14.EPRT');
		Nomenclature::ajouterLigne(32,	'Support de butée',							1,	'Support2butee.EPRT',			'C 40');
		Nomenclature::ajouterLigne(33,	'Butée de positionnement extérieure',		5,	'Butee2positionnement_ext.EPRT','C 40');
		Nomenclature::ajouterLigne(34,	'Goupille 3 x 20',							2,	'Goupille3x20.EPRT',			'',			'ISO 8752');
		Nomenclature::ajouterLigne(35,	'Vis tête fraisée M6-12',					4,	'VisFSM6-12.EPRT',				'',			'ISO 10642');
		Nomenclature::ajouterLigne(36,	'Appui fil d=8 L = 150',					1,	'Appui_fil_d8_L150.EPRT');
		Nomenclature::ajouterLigne(37,	'Branche gauche',							1,	'branche_gauche.EPRT');
		Nomenclature::ajouterLigne(38,	'Branche droite',							1,	'branche_droite.EASM');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
	 * Affiche la page de fonctionnement
	 *
	 * @route /cambreuse/fonctionnement
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnement(Request $requete, Response $reponse): Response
	{
		return $this->renduPageFonctionnement($reponse);
	}

	/**
	 * Affiche la page de l'étape 1 du fonctionnement
	 *
	 * @route /cambreuse/fonctionnement/etape1
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnementEtape1(Request $requete, Response $reponse): Response
	{
		return $this->renduPageImage(
			$reponse,
			"Étape 1",
			"<p>L'opérateur met en place les branches de frein sur le posoir.
			<br>Nota: le flasque avant est caché</p>",
			'position1.png',
			"étape 1",
			"",
			700
		);
	}

	/**
	 * Affiche la page de l'étape 2 du fonctionnement
	 *
	 * @route /cambreuse/fonctionnement/etape2
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnementEtape2(Request $requete, Response $reponse): Response
	{
		return $this->renduPageImage(
			$reponse,
			"Étape 2",
			"<p>Le vérin pneumatique de bridage est actionné en premier de façon à bloquer les branches dans le posoir sur leur partie avant.
			<br>Nota: le flasque avant est caché</p>",
			'position2.png',
			"étape 2",
			"",
			700
		);
	}

	/**
	 * Affiche la page de l'étape 3 du fonctionnement
	 *
	 * @route /cambreuse/fonctionnement/etape3
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnementEtape3(Request $requete, Response $reponse): Response
	{
		return $this->renduPageImage(
			$reponse,
			"Étape 3",
			"<p>Ensuite, le vérin pneumatique de cambrage actionne par l'intermédiaire de la bielle le basculeur qui pivote autour de deux axes (28).
			Le basculeur soulève alors la partie arrière des branches de frein pour leur donner la forme souhaitée.
			<br>Nota: le flasque avant est caché</p>",
			'position3.png',
			"étape 3",
			"",
			700
		);
	}

	/**
	 * Affiche la page des caractéristiques
	 *
	 * @route /cambreuse/caracteristiques
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function caracteristiques(Request $requete, Response $reponse): Response
	{
		return $this->renduPageOrdinaire($reponse, 'caracteristiques.html');
	}

	/**
	 * Affiche la page des eclate
	 *
	 * @route /cambreuse/classe-equivalence
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function eclate(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'cambreuse', 'eclate_cambreuse2', "Les classes d'équivalence de la cambreuse");
	}

	/**
	 * Affiche la page du sous-ensemble bâti
	 *
	 * @route /cambreuse/classe-equivalence/bati
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function SEbati(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'SE_bati', 'SE_bati', 'Sous-ensemble bâti');
	}

	/**
	 * Affiche la page de la tige de vérin de cambrage
	 *
	 * @route /cambreuse/classe-equivalence/tige-cambrage
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function tigeCambrage(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'SE_tige2cambrage', 'SE_tige2cambrage', 'Sous-ensemble tige de vérin de cambrage');
	}

	/**
	 * Affiche la page de la tige de vérin de bridage
	 *
	 * @route /cambreuse/classe-equivalence/tige-bridage
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function tigeBridage(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'SE_tige2bridage', 'SE_tige2bridage', 'Sous-ensemble tige de vérin de bridage');
	}

	/**
	 * Affiche la page du sous-ensemble basculeur
	 *
	 * @route /cambreuse/classe-equivalence/basculeur
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function SEbasculeur(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'SE_basculeur', 'SE_basculeur', 'Sous-ensemble basculeur');
	}

	/**
	 * Affiche la page du sous-ensemble bielle
	 *
	 * @route /cambreuse/classe-equivalence/bielle
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function SEbielle(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'SE_bielle', 'SE_bielle', 'Sous-ensemble bielle');
	}

	/**
	 * Affiche l'éclaté en pièces détachées
	 *
	 * @route /cambreuse/pieces-detachees
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function piecesDetachees(Request $requete, Response $reponse): Response
	{
		return $this->renduPageImage(
			$reponse,
			"Pièce détachées",
			"",
			'eclate-cambreuse.png',
			"cambreuse en pièces détachées",
			"<p>Pas de fichier disponible.</p>",
			800
		);
	}
}
