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
     * @return Response
     */
    public function nomenclature(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

	/**
     * Affiche la page des éléments constitutifs.
     *
     * @route /unite-de-marquage/elements
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function elements(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'élément corps.
     *
     * @route /unite-de-marquage/elements/corps
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function elementsCorps(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'élément vérin.
     *
     * @route /unite-de-marquage/elements/verin
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function elementsVerin(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'élément enclume.
     *
     * @route /unite-de-marquage/elements/enclume
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function elementsEnclume(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'élément embiellage.
     *
     * @route /unite-de-marquage/elements/embiellage
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function elementsEmbiellage(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'élément levier.
     *
     * @route /unite-de-marquage/elements/levier
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function elementsLevier(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de fonctionnement.
     *
     * @route /unite-de-marquage/fonctionnement
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
     * Affiche la page de la vue éclatée.
     *
     * @route /unite-de-marquage/eclate
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclate(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'unite-de-marquage', 'eclate-unite-de-marquage');
    }

    /**
     * Affiche la page des classes d'équivalence.
     *
     * @route /unite-de-marquage/CE
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function classeEquivalence(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page du flasque droit.
     *
     * @route /unite-de-marquage/flasque-droit
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function flasqueDroit(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de détail du flasque.
     *
     * @route /unite-de-marquage/flasque-droit/flasque
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function flasqueDroitFlasque(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche le dessin de définition du flasque droit.
     *
     * @route /unite-de-marquage/flasque-droit/dessin-definition
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function flasqueDroitDessinDefinition(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de mécanique globale.
     *
     * @route /unite-de-marquage/mecanique
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
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
     * @return Response
     */
    public function mecaEffortsEmbiellageLevier(Request $requete, Response $reponse): Response
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
     * @return Response
     */
    public function mecaEffortMarquage(Request $requete, Response $reponse): Response
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
     * @return Response
     */
    public function mecaVitesseBiellette(Request $requete, Response $reponse): Response
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
     * @return Response
     */
    public function mecaVitesseLevier(Request $requete, Response $reponse): Response
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
