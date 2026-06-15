<?php
/**
 * Contrôleur du frein à disque
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class FreinDisqueControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support frein à disque.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('frein a disque', "du ", 'frein-a-disque', 'frein.png');
    }

    /**
     * Affiche la page 'à propos'
     *
     * @route /frein-a-disque
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'frein-a-disque.zip',
			[],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation du frein à disque.
     *
     * @route /frein-a-disque/mise-en-situation
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
     * Affiche la page du dessin d'ensemble du frein à disque.
     *
     * @route /frein-a-disque/dessin-densemble
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
	 * Affiche la page de nomenclature du frein à disque.
	 *
	 * @route /frein-a-disque/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'disque',				1,	'disque.EPRT');
		Nomenclature::ajouterLigne(2,	'plaquette',			2,	'plaquette.EPRT');
		Nomenclature::ajouterLigne(3,	'contre étrier',		1,	'contreEtrier.EPRT');
		Nomenclature::ajouterLigne(4,	'corps d\'étrier',		1,	'corpsEtrier.EPRT');
		Nomenclature::ajouterLigne(5,	'branche étrier',		1,	'brancheEtrier.EPRT');
		Nomenclature::ajouterLigne(6,	'colonnette B',			1,	'colonnetteB.EPRT');
		Nomenclature::ajouterLigne(7,	'tube colonnette B',	1,	'tubeColonnetteB.EPRT');
		Nomenclature::ajouterLigne(8,	'vis H78',				2,	'visH78.EPRT');
		Nomenclature::ajouterLigne(9,	'colonnette A',			1,	'colonnetteA.EPRT');
		Nomenclature::ajouterLigne(10,	'vis CHc147',			2,	'visCHc147.EPRT');
		Nomenclature::ajouterLigne(11,	'piston',				1,	'piston.EPRT');
		Nomenclature::ajouterLigne(12,	'joint carré',			1,	'jointCarre.EPRT');
		Nomenclature::ajouterLigne(13,	'joint de piston',		1,	'joint2piston.EPRT');
		Nomenclature::ajouterLigne(14,	'joint colonnette',		2,	'jointColonnette.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
     * Affiche la page de fonctionnement du frein à disque.
     *
     * @route /frein-a-disque/fonctionnement
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
     * Affiche la page de l'éclaté du frein à disque.
     *
     * @route /frein-a-disque/eclate
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
