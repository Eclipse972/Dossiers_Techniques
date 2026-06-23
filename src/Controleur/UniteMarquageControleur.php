<?php
/**
 * Contrôleur de l' unité de marquage
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class UniteMarquageControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support unité de marquage.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('unité de marquage', "de l'", 'unite-de-marquage', 'unite2marquage.png');
    }

    /**
     * Affiche la page 'à propos'
     *
     * @route /unite-de-marquage
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'unite-de-marquage.zip',
			[
				"plusieurs fichiers au lieu d'utiliser des configurations",
				"le fichier préhenseur pour étude d'ouverture permet de voir le fonctionnement",
			],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation de l' unité de marquage.
     *
     * @route /unite-de-marquage/mise-en-situation
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function miseEnSituation(Request $requete, Response $reponse): Response
    {
        return $this->renduPageOrdinaire($reponse, 'mise-en-situation.html.twig');
    }

    /**
     * Affiche la page du dessin d'ensemble de l' unité de marquage.
     *
     * @route /unite-de-marquage/dessin-densemble
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
     * Affiche la page de nomenclature de l' unité de marquage.
     *
     * @route /unite-de-marquage/nomenclature
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function nomenclature(Request $requete, Response $reponse): Response
    {
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Flasque droit',				1,	'flasque-droit.EPRT');
		Nomenclature::ajouterLigne(2,	'Flasque gauche',				1,	'flasque-gauche.EPRT');
		Nomenclature::ajouterLigne(3,	'Entretoise arrière',			1,	'entretoise-arriere.EPRT');
		Nomenclature::ajouterLigne(4,	'Entretoise avant',				1,	'entretoise-avant.EPRT');
		Nomenclature::ajouterLigne(5,	'Goupille cylindrique 10 x 60',	4,	'goupille-cylindrique10x60.EPRT',	'ISO 8734');
		Nomenclature::ajouterLigne(6,	'Vis CHc M8 x 90',				4,	'vis-CHc-M8x90.EPRT');
		Nomenclature::ajouterLigne(7,	'Came',							2,	'came.EPRT');
		Nomenclature::ajouterLigne(8,	'Vis CHc M5 x 25',				6,	'vis-CHc-M5x25.EPRT');
		Nomenclature::ajouterLigne(9,	'Support enclume',				1,	'support-enclume.EPRT');
		Nomenclature::ajouterLigne(10,	'Goupille cylindrique 10 x 40',	2,	'goupille-cylindrique10x40.EPRT',	'ISO 8734');
		Nomenclature::ajouterLigne(11,	'Vis CHc M16 x 70',				4,	'vis-CHc-M16x70.EPRT');
		Nomenclature::ajouterLigne(12,	'Enclume',						1,	'enclume.EPRT');
		Nomenclature::ajouterLigne(13,	'Vis CHc M12 x 35',				2,	'vis-CHc-M12x35.EPRT');
		Nomenclature::ajouterLigne(14,	'Support détecteur',			1,	'support-detecteur.EPRT');
		Nomenclature::ajouterLigne(15,	'DPI K62',						1,	'DPI-K62.EPRT');
		Nomenclature::ajouterLigne(16,	'Vis CHc M4 x 15',				2,	'vis-CHc-M4x15.EPRT');
		Nomenclature::ajouterLigne(17,	'Fond avant',					1,	'fond-avant.EPRT');
		Nomenclature::ajouterLigne(18,	'Tube',							1,	'tube.EPRT');
		Nomenclature::ajouterLigne(19,	'Fond arrière',					1,	'fond-arriere.EPRT');
		Nomenclature::ajouterLigne(20,	'Écrou tirant',					8,	'ecrou-tirant.EPRT');
		Nomenclature::ajouterLigne(21,	'Tirant',						4,	'tirant.EPRT');
		Nomenclature::ajouterLigne(22,	'Vis Hc M6 x 10',				4,	'vis-Hc-M6x10.EPRT');
		Nomenclature::ajouterLigne(23,	'Support vérin',				1,	'support-verin.EPRT');
		Nomenclature::ajouterLigne(24,	'Vis CHc M10 x 25',				4,	'vis-CHc-M10x25.EPRT');
		Nomenclature::ajouterLigne(25,	'Axe levier',					1,	'axe-levier.EPRT');
		Nomenclature::ajouterLigne(26,	'Coussinet XFM 3034 26',		2,	'coussinet-XFM-3034-26.EPRT');
		Nomenclature::ajouterLigne(27,	'Rondelle de butées AS 3047',	2,	'rondelle-AS-3047.EPRT');
		Nomenclature::ajouterLigne(28,	'Levier',						1,	'levier.EPRT');
		Nomenclature::ajouterLigne(29,	'Vis CHc M8 x 20',				2,	'vis-CHc-M8x20.EPRT');
		Nomenclature::ajouterLigne(30,	'Axe biellette-levier',			1,	'axe-biellette-levier.EPRT');
		Nomenclature::ajouterLigne(31,	'Biellette',					2,	'biellette.EPRT');
		Nomenclature::ajouterLigne(32,	'Axe biellette-chape',			1,	'axe-biellette-chape.EPRT');
		Nomenclature::ajouterLigne(33,	'Galet',						2,	'galet.EPRT');
		Nomenclature::ajouterLigne(34,	'Coussinet XSM',				4,	'coussinet-XSM.EPRT');
		Nomenclature::ajouterLigne(35,	'Coussinet XFM',				2,	'coussinet-XFM.EPRT');
		Nomenclature::ajouterLigne(36,	'Piston',						1,	'piston.EPRT');
		Nomenclature::ajouterLigne(37,	'Tige piston',					1,	'tige-piston.EPRT');
		Nomenclature::ajouterLigne(38,	'Chape',						1,	'chape.EPRT');
		Nomenclature::ajouterLigne(39,	'Joint racleur',				1,	'joint-racleur.EPRT');
		Nomenclature::ajouterLigne(40,	'Joint circulaire',				1,	'joint-circulaire.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
    }

	/**
     * Affiche la page des éléments constitutifs.
     *
     * @route /unite-de-marquage/element
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function elements(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImageFichier(
			$reponse,
			"Éléments constitutuifs",
			"<p style=\"text-align:center\">Cliquez sur l'image pour télécharger le fichier associé.</p>",
			'unite2marquage.png',
			'unite-de-marquage.EASM',
			"unité de marquage",
			"télécharger la maquette numérique",
			"<p style=\"text-align:center\">Cliquez dans le menu pour afficher les éléments individuellement.</p><p>ATTENTION: ces éléments ne sont pas des classes d'équivalence.</p>",
			600
		);
    }

    /**
     * Affiche la page de l'élément corps.
     *
     * @route /unite-de-marquage/element/corps
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function elementsCorps(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'embase', 'embase', 'Corps');
    }

    /**
     * Affiche la page de l'élément vérin.
     *
     * @route /unite-de-marquage/element/verin
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function elementsVerin(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'verin', 'verin', 'Vérin');
    }

    /**
     * Affiche la page de l'élément enclume.
     *
     * @route /unite-de-marquage/element/enclume
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function ensembleEnclume(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'enclume', 'ensemble-enclume', 'Enclume');
    }

    /**
     * Affiche la page de fonctionnement.
     *
     * @route /unite-de-marquage/fonctionnement
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function fonctionnement(Request $requete, Response $reponse): Response
    {
        return $this->renduPageOrdinaire($reponse, 'fonctionnement.html.twig');
    }

	    /**
     * Affiche la page de fonctionnement.
     *
     * @route /unite-de-marquage/caracteristiques
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
     * Affiche la page de la vue éclatée.
     *
     * @route /unite-de-marquage/eclate
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function eclate(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'unite-de-marquage', 'eclate-unite-de-marquage');
    }

    /**
     * Affiche la page des classes d'équivalence.
     *
     * @route /unite-de-marquage/classe-equivalence
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
     * Affiche la page de la classe d'équivalence embase.
     *
     * @route /unite-de-marquage/classe-equivalence/embase
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function CEembase(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

	/**
     * Affiche la page de la classe d'équivalence piston.
     *
     * @route /unite-de-marquage/classe-equivalence/piston
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function CEpiston(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

	/**
     * Affiche la page de la classe d'équivalence galet.
     *
     * @route /unite-de-marquage/classe-equivalence/galet
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function CEgalet(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

	/**
     * Affiche la page de la classe d'équivalence embiellage.
     *
     * @route /unite-de-marquage/classe-equivalence/embiellage
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function CEembiellage(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'embiellage', 'embiellage', 'Embiellage');
    }

	/**
     * Affiche la page de la classe d'équivalence levier.
     *
     * @route /unite-de-marquage/classe-equivalence/levier
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function CElevier(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'levier', 'ensemble-levier', 'Levier');
    }

    /**
     * Affiche la page de mécanique globale.
     *
     * @route /unite-de-marquage/mecanique
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function mecanique(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Mécanique",
			"Graphe Méca3D :",
			'grapheMeca3D.png',
			"graphe méca 3D",
			"",
			700
		);
    }

    /**
     * Affiche l'étude des efforts embiellage/levier.
     *
     * @route /unite-de-marquage/mecanique/efforts-embiellage-levier
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function effortEmbiellageLevier(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Courbe des efforts transmis par l'embiellage sur le levier",
			"",
			'effort_pivot_glissant.png',
			"courbe effort pivot glissant",
			"",
			800
		);
    }

    /**
     * Affiche l'étude de l'effort de marquage.
     *
     * @route /unite-de-marquage/mecanique/effort-marquage
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function effortMarquage(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Courbe de l'effort de marquage",
			"",
			'effort_marquage.png',
			"courbe effort de marquage",
			"",
			800
		);
    }

    /**
     * Affiche l'étude de la vitesse de la biellette.
     *
     * @route /unite-de-marquage/mecanique/vitesse-bielette
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function vitesseBiellette(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Courbe de la vitesse de la biellette par rapport à l'embase",
			"",
			'vitesse_biellette.png',
			"courbe vitesse de la bielette",
			"",
			800
		);
    }

    /**
     * Affiche l'étude de la vitesse du levier.
     *
     * @route /unite-de-marquage/mecanique/vitesse-levier
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function vitesseLevier(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Courbe de la vitesse de la biellette par rapport à l'embase",
			"",
			'vitesse_levier.png',
			"courbe vitesse du levier",
			"",
			800
		);
    }
}
