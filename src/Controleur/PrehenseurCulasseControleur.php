<?php
/**
 * Contrôleur du préhenseur de culasse
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

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
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de nomenclature du préhenseur de culasse.
     *
     * @route /prehenseur-de-culasse/nomenclature
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
    }
}
