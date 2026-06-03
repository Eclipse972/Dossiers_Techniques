<?php
/**
 * Contrôleur de l'alternateur
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
        return $this->renduPageEnConstruction($requete, $reponse);
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
