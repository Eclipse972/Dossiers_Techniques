<?php
/**
 * Contrôleur du moteur de modélisme
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class MoteurModelismeControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support moteur de modélisme.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('moteur de modelisme', "du ", 'moteur-de-modelisme', 'moteur.png');
    }

    /**
     * Affiche la page 'à propos'
     *
     * @route /moteur-de-modelisme
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'moteur-de-modelisme.zip',
			[],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation du moteur de modélisme.
     *
     * @route /moteur-de-modelisme/mise-en-situation
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function miseEnSituation(Request $requete, Response $reponse): Response
    {
        return $this->renduPageOrdinaire($reponse, 'mise-en-situation');
    }

    /**
     * Affiche la page du dessin d'ensemble du moteur de modélisme.
     *
     * @route /moteur-de-modelisme/dessin-densemble
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
	 * Affiche la page de nomenclature du moteur de modélisme.
	 *
	 * @route /moteur-de-modelisme/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'carter moteur',							1,	'carter_moteur.EPRT');
		Nomenclature::ajouterLigne(2,	'cylindre',									1,	'cylindre.EPRT');
		Nomenclature::ajouterLigne(3,	'culasse',									1,	'culasse.EPRT');
		Nomenclature::ajouterLigne(4,	'vis CHc M3-15',							1,	'CHcM3-15.EPRT');
		Nomenclature::ajouterLigne(5,	'joint capot',								1,	'joint_capot.EPRT');
		Nomenclature::ajouterLigne(6,	'capot',									1,	'capot.EPRT');
		Nomenclature::ajouterLigne(7,	'grand roulement',							1,	'grand_roulement.EASM');
		Nomenclature::ajouterLigne(8,	'axe piston',								1,	'axe_piston.EPRT');
		Nomenclature::ajouterLigne(9,	'jonc',										1,	'jonc.EPRT');
		Nomenclature::ajouterLigne(10,	'petit roulement',							1,	'petit_roulement.EASM');
		Nomenclature::ajouterLigne(11,	'coussinet ø5',								1,	'coussinet_d5.EPRT');
		Nomenclature::ajouterLigne(12,	'bielle',									1,	'bielle.EPRT');
		Nomenclature::ajouterLigne(13,	'vilebrequin',								1,	'vilebrequin.EPRT');
		Nomenclature::ajouterLigne(14,	'piston',									1,	'piston.EPRT');
		Nomenclature::ajouterLigne(15,	'coussinet ø6',								1,	'coussinet_d6.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
     * Affiche la page de fonctionnement du moteur de modélisme.
     *
     * @route /moteur-de-modelisme/fonctionnement
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function fonctionnement(Request $requete, Response $reponse): Response
    {
        return $this->renduPageOrdinaire($reponse, 'fonctionnement');
    }

    /**
     * Affiche la page principale des classes d'équivalence.
     *
     * @route /moteur-de-modelisme/classe-equivalence
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
     * Affiche la classe d'équivalence 1 (le bâti).
     *
     * @route /moteur-de-modelisme/classe-equivalence/bati
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function CEbati(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la classe d'équivalence 2 (le vilebrequin).
     *
     * @route /moteur-de-modelisme/classe-equivalence/vilebrequin
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function CEvilebrequin(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la classe d'équivalence 3 (la bielle).
     *
     * @route /moteur-de-modelisme/classe-equivalence/bielle
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function CEbielle(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la classe d'équivalence 4 (le piston).
     *
     * @route /moteur-de-modelisme/classe-equivalence/piston
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function CEpiston(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }

    /**
     * Affiche la page de l'éclaté du moteur de modélisme.
     *
     * @route /moteur-de-modelisme/eclate
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclate(Request $requete, Response $reponse): Response
    {
        return $this->renduPageEnConstruction($requete, $reponse);
    }
}
