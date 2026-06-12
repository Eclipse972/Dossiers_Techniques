<?php
/**
 * Contrôleur de l'alternateur
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class BrideAnezControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support Alternateur.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('bride à nez', "de la ", 'bride-a-nez', 'bride.png');
    }


    /**
     * Affiche la page 'à propos' de la bride nez
     *
     * @route /bride-a-nez
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'bride-a-nez.zip',
			[],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation de l'alternateur.
     *
     * @route /bride-a-nez/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de l'alternateur.
     *
     * @route /bride-a-nez/dessin-densemble
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
	 * Affiche la page de nomenclature de la bride à nez.
	 *
	 * @route /bride-a-nez/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Tête de bride',							1,	'tete2bride.EPRT',			'EN-GJS-600-2');
		Nomenclature::ajouterLigne(2,	'Corps de vérin',							1,	'corps2verin.EPRT',			'EN-GJS-600-2');
		Nomenclature::ajouterLigne(3,	'Support lame de ressort',					1,	'support_lame2ressort.EPRT',	'S 235 (E24)');
		Nomenclature::ajouterLigne(4,	'Vis à tête cylindrique à 6 pans creux M3-6',	3,	'visCHcM3-6.EPRT');
		Nomenclature::ajouterLigne(5,	'Vis à tête fraisée fendue M4-13',			2,	'visFSM4-13.EPRT');
		Nomenclature::ajouterLigne(6,	'Vis à tête cylindrique à 6 pans creux M6-20',	4,	'visCHcM6-20.EPRT');
		Nomenclature::ajouterLigne(7,	'Rondelle Grower W6',						4,	'rondelle_growerW6.EPRT');
		Nomenclature::ajouterLigne(8,	'Vis sans tête à six pans creux',			1,	'visAHcM10-10.EPRT');
		Nomenclature::ajouterLigne(9,	'Plaquette avant',							1,	'plaquette_avant.EPRT',		'EN AW 2017');
		Nomenclature::ajouterLigne(10,	'Vis à tête fraisée fendue M3-8',			4,	'visFSM3-8.EPRT');
		Nomenclature::ajouterLigne(11,	'Axe',										1,	'axe.EPRT',					'C 55');
		Nomenclature::ajouterLigne(12,	'Anneau élastique pour alésage 40x1,75',	1,	'anneau_elastique40x1,75.EPRT');
		Nomenclature::ajouterLigne(13,	'Vis sans tête à six pans creux M6-10',		1,	'visAHcM6-10.EPRT');
		Nomenclature::ajouterLigne(14,	'Lame de ressort',							1,	'lame2ressort.EPRT',		'55 Cr3');
		Nomenclature::ajouterLigne(15,	'Nez de bride',								1,	'nez2bride.EPRT',			'E 295');
		Nomenclature::ajouterLigne(16,	'Piston',									1,	'piston.EPRT');
		Nomenclature::ajouterLigne(17,	'Segment de guidage de 40',					1,	'segment2guidage40.EPRT',	'téflon');
		Nomenclature::ajouterLigne(18,	'Bague anti extrusion 34-40',				3,	'bague_anti_extrusion34-40.EPRT','téflon');
		Nomenclature::ajouterLigne(19,	'Joint torique 35,6x3,6',					2,	'joint_torique35,6x3,6.EPRT');
		Nomenclature::ajouterLigne(20,	'Douille',									1,	'douille.EPRT');
		Nomenclature::ajouterLigne(21,	'Joint torique 16,6x2,7',					1,	'joint_torique16,9x2,7.EPRT');
		Nomenclature::ajouterLigne(22,	'Bague anti-extrusion 18-21',				1,	'bague_anti-extrusion18-21.EPRT','téflon');
		Nomenclature::ajouterLigne(23,	'Segment de guidage de 18',					1,	'racleur18.EPRT',			'C35');
		Nomenclature::ajouterLigne(24,	'Goupille élastique 4 x 35',				1,	'goupille4x35.EPRT');
		Nomenclature::ajouterLigne(25,	'chape',									1,	'chape.EPRT',				'C35');
		Nomenclature::ajouterLigne(26,	'Axe de chape',								1,	'axe2chape.EPRT',			'C 55');
		Nomenclature::ajouterLigne(27,	'Plaquette plastique',						1,	'plaquette_plastique.EPRT');
		Nomenclature::ajouterLigne(28,	'Ressort de compression',					1,	'ressort.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

    /**
     * Affiche la page de fonctionnement de la bride à nez.
     *
     * @route /bride-a-nez/fonctionnement
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
     * Affiche la page du début de la phase 1 du fonctionnement.
     *
     * @route /bride-a-nez/fonctionnement/debut-phase1
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function fonctionnementDebutPhase1(Request $requete, Response $reponse): Response
    {
		$texte =
			"<p>La tige du vérin et le nez sont totalement rentrés. L'axe est en contact avec l'extrémité gauche du trou oblong dans le nez.</p>
			<p>On alimente ensuite la chambre par l'orifice de droite avec de l'huile sous pression. C'est le début de la phase 1.</p>";

        return $this->renduPageImage(
			$reponse,
			"Début de la phase 1",
			$texte,
			'nez_rentre.png',
			"bride nez rentré",
			"",
			400
		);
    }

    /**
     * Affiche la page de la phase 1 du fonctionnement.
     *
     * @route /bride-a-nez/fonctionnement/phase1
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function fonctionnementPhase1(Request $requete, Response $reponse): Response
    {
        $texte =
			"<p>Le piston pousse le nez. Pour éviter qu'il tourne il y a une lame de ressort (non visible sur l'animation) sous le nez qui le maintient à l'horizontale.
			<br>La phase se termine lorsque l'axe entre en contact avec le côté droit du trou oblong.</p>";

        return $this->renduPageImage(
			$reponse,
			"La phase 1",
			$texte,
			'sortie_nez.gif',
			"sortie du nez",
			"",
			500
		);
    }

    /**
     * Affiche la page du début de la phase 2 du fonctionnement.
     *
     * @route /bride-a-nez/fonctionnement/debut-phase2
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function fonctionnementDebutPhase2(Request $requete, Response $reponse): Response
    {
        $texte =
			"<p>Le nez est totalement sorti mais la tige de vérin n'est pas en bout de course. L'axe est en contact avec l'extrémité droite du trou oblong dans le nez.
			<br>On continue d'alimenter la chambre avec de l'huile sous pression. C'est le début de la phase 2.</p>";

        return $this->renduPageImage(
			$reponse,
			"Début de la phase 2",
			$texte,
			'debut_rotation.png',
			"début de la rotation du nez",
			"",
			500
		);
    }

    /**
     * Affiche la page de la phase 2 du fonctionnement.
     *
     * @route /bride-a-nez/fonctionnement/phase2
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function fonctionnementPhase2(Request $requete, Response $reponse): Response
    {
        $texte =
			"<p>Le piston pousse le nez mais celui-ci ne peut plus avancer à cause de l'axe en contact avec le trou oblong. Le seul mouvement possible est une rotation autour de l'axe.
			<br>La lame de ressort (non visible sur l'animation) ne peut plus maintenir le nez à l'horizontale et se déforme.</p>";

        return $this->renduPageImage(
			$reponse,
			"La phase 2",
			$texte,
			'rotation_nez.gif',
			"rotation du nez",
			"",
			550
		);
    }

    /**
     * Affiche la page des caractéristiques de la bride à nez.
     *
     * @route /bride-a-nez/caracteristiques
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function caracteristiques(Request $requete, Response $reponse): Response
    {
        return $this->vue->render($reponse, '112-pageDT.html.twig', [
			'support'	=> $this->nom,
			'du'		=> $this->article_du,
			'dossier'	=> $this->dossier,
			'logo'		=> $this->logo,
			'fichier'	=> 'caracteristiques',
		]);
    }

    /**
     * Affiche la page du montage de bridage.
     *
     * @route /bride-a-nez/montage-bridage
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function montageBridage(Request $requete, Response $reponse): Response
    {
       return $this->renduPageImage(
			$reponse,
			"Montage de bridage sur plateau tournant",
			"",
			'montage_bridage.png',
			"montage de bridage",
			"",
			750
		);
    }

    /**
     * Affiche la page de l'éclaté du montage de la bride à nez.
     *
     * @route /bride-a-nez/eclate-montage
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function eclateMontage(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Éclaté du montage",
			"",
			'vue_eclatee.png',
			'pièces détachées',
			'<p>Pas de fichier disponible</p>',
			750
		);
    }

    /**
     * Affiche la page des sous-ensembles de la bride à nez.
     *
     * @route /bride-a-nez/sous-ensembles
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function sousEnsembles(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'bride', 'eclateSE');
    }

    /**
     * Affiche la page du sous-ensemble corps de la bride.
     *
     * @route /bride-a-nez/SE/corps-bride
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function SEcorpsBride(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'corps2bride', 'corps2bride', "Classe d'équivalence : corps de la bride");
    }

    /**
     * Affiche la page du sous-ensemble nez de la bride.
     *
     * @route /bride-a-nez/SE/nez-bride
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function SEnezBride(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page du sous-ensemble ensemble piston.
     *
     * @route /bride-a-nez/SE/ensemble-piston
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function SEensemblePiston(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'piston_complet', 'piston_complet', "Classe d'équivalence : piston de la bride");
    }

    /**
     * Affiche la page du sous-ensemble plaquette.
     *
     * @route /bride-a-nez/SE/plaquette
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function SEplaquette(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page du sous-ensemble ressort.
     *
     * @route /bride-a-nez/SE/ressort
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function SEressort(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }
}
