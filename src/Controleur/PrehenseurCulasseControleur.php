<?php
/**
 * Contrôleur du préhenseur de culasse
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class PrehenseurCulasseControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support préhenseur de culasse.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('prehenseur de culasse', "du ", 'prehenseur-de-culasse', 'prehenseur.png');
    }

    /**
     * Affiche la page 'à propos' du bouton poussoir
     *
     * @route /prehenseur-de-culasse
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'prehenseur-de-culasse.zip',
			[
				"plusieurs fichiers au lieu d'utiliser des configurations",
				"le fichier préhenseur pour étude d'ouverture permet de voir le fonctionnement",
			],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation du préhenseur de culasse.
     *
     * @route /prehenseur-de-culasse/mise-en-situation
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
     * Affiche la page du dessin d'ensemble du préhenseur de culasse.
     *
     * @route /prehenseur-de-culasse/dessin-densemble
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
	 * Affiche la page de nomenclature du préhenseur de culasse.
	 *
	 * @route /prehenseur-de-culasse/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Châssis',							1,	'chassis.EPRT');
		Nomenclature::ajouterLigne(2,	'Renfort',							2,	'renfort.EPRT');
		Nomenclature::ajouterLigne(3,	'Vis H M5 8',						4,	'visHM5-8.EPRT');
		Nomenclature::ajouterLigne(4,	'Vis H M 10',						14,	'visHM6-10.EPRT');
		Nomenclature::ajouterLigne(5,	'Rail TKSD',						4,	'railTKSD.EPRT');
		Nomenclature::ajouterLigne(6,	'Chariot',							4,	'chariot.EPRT');
		Nomenclature::ajouterLigne(7,	'Ensemble mécano-soudé 2 doigts',	1,	'ensemble2doigts.EASM');
		Nomenclature::ajouterLigne(8,	'Vis HM8 16',						4,	'visHM8-16.EPRT');
		Nomenclature::ajouterLigne(9,	'Rondelle M8',						4,	'rondelleM8.EPRT');
		Nomenclature::ajouterLigne(10,	'Guide ressort',					4,	'guide.EPRT');
		Nomenclature::ajouterLigne(11,	'Vis CHc M8 12',					3,	'visCHcM8-12.EPRT');
		Nomenclature::ajouterLigne(13,	'Doigt',							3,	'doigt.EPRT');
		Nomenclature::ajouterLigne(14,	'Vic CHc M5 16',					32,	'visCHcM5-16.EPRT');
		Nomenclature::ajouterLigne(15,	'Écrou H M16',						4,	'ecrouHM16.EPRT');
		Nomenclature::ajouterLigne(16,	'Équerre mobile',					2,	'equerreUPN.EPRT');
		Nomenclature::ajouterLigne(18,	'Carter',							1,	'carter.EPRT');
		Nomenclature::ajouterLigne(19,	'Bague',							4,	'bague2biellette.EPRT');
		Nomenclature::ajouterLigne(20,	'Biellette',						2,	'biellette.EPRT');
		Nomenclature::ajouterLigne(21,	'Fixation vérin',					2,	'bride.EPRT');
		Nomenclature::ajouterLigne(22,	'Corps de vérin Joucomatic',		1,	'corps2verin.EPRT',		'',	'K 63 D 80 M');
		Nomenclature::ajouterLigne(23,	'Noix',								1,	'noix.EPRT');
		Nomenclature::ajouterLigne(24,	'Ensemble mécano-soudé 1 doigt',	1,	'ensemble1doigt.EASM');
		Nomenclature::ajouterLigne(25,	'Piston du vérin',					1,	'piston.EPRT');
		Nomenclature::ajouterLigne(26,	'Ressort',							1,	'ressort.EPRT');
		Nomenclature::ajouterLigne(27,	'Équerre fixe',						2,	'equerre_fixe.EPRT');
		Nomenclature::ajouterLigne(28,	'Vis CHc M8 30',					4,	'visCHcM8-30.EPRT');
		Nomenclature::ajouterLigne(29,	'Vis CHc M6 25',					4,	'visCHcM6-25.EPRT');
		Nomenclature::ajouterLigne(30,	'Rondelle M6',						4,	'rondelleM6.EPRT');
		Nomenclature::ajouterLigne(31,	'Vis CHc M10 25',					4,	'visCHcM10-25.EPRT');
		Nomenclature::ajouterLigne(32,	'Vis CHc M4 22',					16,	'visCHcM4-22.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
     * Affiche la page du dispositif de transfert.
     *
     * @route /prehenseur-de-culasse/mise-en-situation/dispositif-de-transfert
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function MESdispositif(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Dispositif de transfert",
			"",
			'dispositif_transfert.png',
			"dispositif de transfert",
			"",
			600
		);
    }

    /**
     * Affiche la page de l'étape 1 de la mise en situation.
     *
     * @route /prehenseur-de-culasse/mise-en-situation/etape1
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function MESetape1(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Étape 1",
			"La culasse et son adaptateur arrivent sur le plateau rotatif. Celui-ci effectue une rotation d'un quart de tour. Les deux préhenseurs sont à vide",
			'etape1.png',
			"étape 1",
			"",
			700
		);
    }

    /**
     * Affiche la page de l'étape 2 de la mise en situation.
     *
     * @route /prehenseur-de-culasse/mise-en-situation/etape2
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function MESetape2(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Étape 2",
			"Le portique descend, un préhenseur attrape l'adaptateur de culasse.",
			'etape2.png',
			"étape 2",
			"",
			700
		);
    }

    /**
     * Affiche la page des étapes 3 et 4 de la mise en situation.
     *
     * @route /prehenseur-de-culasse/mise-en-situation/etape3-4
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function MESetape34(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'étape 5 de la mise en situation.
     *
     * @route /prehenseur-de-culasse/mise-en-situation/etape5
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function MESetape5(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Étape 5",
			"Le portique se déplace vers le centre d'usinage où une culasse attend d'être usinée.",
			'etape5.png',
			"étape 5",
			"",
			700
		);
    }

    /**
     * Affiche la page de l'étape 6 de la mise en situation.
     *
     * @route /prehenseur-de-culasse/mise-en-situation/etape6
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function MESetape6(Request $requete, Response $reponse): Response
    {
		$texte="
		<p>Le portique amène le préhenseur vide dans le centre d'usinage afin de chercher la culasse usinée (avec son adaptateur).
		<br>Il place ensuite la culasse à usiner dans le centre d'usinage et transfererera par la suite la culasse usinée vers le prochain convoyeur.</p>";

        return $this->renduPageImage(
			$reponse,
			"Étape 6",
			$texte,
			'etape6.png',
			"étape 6",
			"",
			600
		);
    }

    /**
     * Affiche la page de fonctionnement globale.
     *
     * @route /prehenseur-de-culasse/fonctionnement
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function fonctionnement(Request $requete, Response $reponse): Response
    {
        return $this->renduFonctionnement($reponse);
    }

    /**
     * Affiche la page de fonctionnement en ouverture.
     *
     * @route /prehenseur-de-culasse/fonctionnement/ouverture
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function fonctionnementOuverture(Request $requete, Response $reponse): Response
    {
        $texte="
		<p>La tige de vérin sort. La noix descend et pousse les biellettes
		<br>Les biellettes écartent les deux bras. Les ressorts se compriment.</p>";

        return $this->renduPageImage(
			$reponse,
			"Ouverture",
			$texte,
			'ouverture.gif',
			"ouverture du préhyenseur",
			"",
			600
		);
    }

    /**
     * Affiche la page de fonctionnement en fermeture.
     *
     * @route /prehenseur-de-culasse/fonctionnement/fermeture
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function fonctionnementFermeture(Request $requete, Response $reponse): Response
    {
        $texte="
		<p>La tige de vérin rentre. La noix monte et entraîne les biellettes
		<br>Les biellettes rapprochent les deux bras. Les ressorts se relâchent.</p>";

        return $this->renduPageImage(
			$reponse,
			"Fermeture",
			$texte,
			'fermeture.gif',
			"fermeture du préhyenseur",
			"",
			600
		);
    }

    /**
     * Affiche la page de la vue éclatée globale.
     *
     * @route /prehenseur-de-culasse/eclate
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclate(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la vue éclatée du bâti.
     *
     * @route /prehenseur-de-culasse/eclate/bati
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclateBati(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'CE1', 'CE1', "Classe d'équivalence : bâti");
    }

    /**
     * Affiche la vue éclatée de la tige de vérin.
     *
     * @route /prehenseur-de-culasse/eclate/tige-verin
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclateTigeVerin(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'CE2', 'CE2', "Classe d'équivalence : tige de vérin");
    }

    /**
     * Affiche la vue éclatée de la biellette.
     *
     * @route /prehenseur-de-culasse/eclate/biellette
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclateBiellette(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'CE3', 'CE3', "Classe d'équivalence : biellette");
    }

    /**
     * Affiche la vue éclatée du bras avec 2 doigts.
     *
     * @route /prehenseur-de-culasse/eclate/bras-avec-2doigts
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclateBras2Doigts(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'CE4', 'CE4', "Classe d'équivalence : bras avec deux doigts");
    }

    /**
     * Affiche la vue éclatée du bras avec 1 doigt.
     *
     * @route /prehenseur-de-culasse/eclate/bras-avec-1doigt
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclateBras1Doigt(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'CE5', 'CE5', "Classe d'équivalence : bras avec un doigt");
    }

    /**
     * Affiche la page de mécanique globale.
     *
     * @route /prehenseur-de-culasse/mecanique
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function mecanique(Request $requete, Response $reponse): Response
    {
        $texte="
		<p>Courbes des déplacements obtenues à l'aide d'un logiciel de calcul et de simulation
		<br>pour une vitesse en sortie de tige du piston V = 60mm/s</p>";

        return $this->renduPageImage(
			$reponse,
			"Simulations mécaniques",
			$texte,
			'vue2dessus.png',
			"mécanique",
			"",
			600
		);
    }

    /**
     * Affiche l'étude mécanique du déplacement de la tige.
     *
     * @route /prehenseur-de-culasse/mecanique/deplacement-tige
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function mecaDeplacementTige(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Évolution du déplacement de la TIGE du vérin par rapport au CHÂSSIS en fonction du temps",
			"",
			'tige.png',
			"déplacement de la tige",
			"",
			600
		);
    }

    /**
     * Affiche l'étude mécanique du déplacement de la pince.
     *
     * @route /prehenseur-de-culasse/mecanique/deplacement-pince
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function mecaDeplacementPince(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Évolution du déplacement de la PINCE par rapport au CHÂSSIS en fonction du temps",
			"",
			'pince.png',
			"déplacement de la pince",
			"",
			600
		);
    }

    /**
     * Affiche l'étude mécanique de l'effort sur la tige.
     *
     * @route /prehenseur-de-culasse/mecanique/effort-tige
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function mecaEffortTige(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Évolution de l'effort développé de la tige de vérin en fonction du temps",
			"",
			'effort_tige.png',
			"effort de la tige",
			"",
			600
		);
    }

    /**
     * Affiche l'étude mécanique de l'effort sur l'articulation.
     *
     * @route /prehenseur-de-culasse/mecanique/effort-articulation
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function mecaEffortArticulation(Request $requete, Response $reponse): Response
    {
        return $this->renduPageImage(
			$reponse,
			"Évolution de l'effort développé dans l'articulation biellette-noix en fonction du temps",
			"",
			'effort_articulation.png',
			"effort de l'articulation",
			"",
			600
		);
    }
}
