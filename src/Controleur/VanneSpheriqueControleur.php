<?php
/**
 * Contrôleur de la vanne sphérique
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class VanneSpheriqueControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support vanne sphérique.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('vanne sphérique', "de la ", 'vanne-spherique', 'vanne.png');
    }

    /**
     * Affiche la page 'à propos'
     *
     * @route /vanne-spherique
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'vanne-spherique.zip',
			["Ajout d'une contrainte limite pour simuler les fins de course angulaire du levier."],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation
     *
     * @route /vanne-spherique/mise-en-situation
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function miseEnSituation(Request $requete, Response $reponse): Response
    {
        return $this->renduPageMiseEnSituation($reponse);
    }

    /**
     * Affiche la page du dessin d'ensemble de la vanne sphérique.
     *
     * @route /vanne-spherique/dessin-densemble
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
	 * Affiche la page de nomenclature de la vanne Legris.
	 *
	 * @route /vanne-spherique/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'raccord',				1,	'raccord.EPRT');
		Nomenclature::ajouterLigne(2,	'joint de bague',		1,	'joint2bague.EPRT');
		Nomenclature::ajouterLigne(3,	'bague',				2,	'bague.EPRT');
		Nomenclature::ajouterLigne(4,	'bille',				1,	'bille.EPRT');
		Nomenclature::ajouterLigne(5,	'corps',				1,	'corps.EPRT');
		Nomenclature::ajouterLigne(6,	'joint entraineur',		1,	'joint_entraineur.EPRT');
		Nomenclature::ajouterLigne(7,	'entraineur',			1,	'entraineur.EPRT');
		Nomenclature::ajouterLigne(8,	'guide entraineur',		1,	'guide_entraineur.EPRT');
		Nomenclature::ajouterLigne(9,	'butée mobile',			1,	'butee_mobile.EPRT');
		Nomenclature::ajouterLigne(10,	'levier de manœuvre',	1,	'levier.EPRT');
		Nomenclature::ajouterLigne(11,	'vis',					1,	'vis.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
     * Affiche la page de fonctionnement de la vanne sphérique.
     *
     * @route /vanne-spherique/fonctionnement
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function fonctionnement(Request $requete, Response $reponse): Response
    {
		return $this->renduPageFonctionnement($reponse);
    }

    /**
     * Affiche la page de la vue éclatée de la vanne sphérique.
     *
     * @route /vanne-spherique/eclate
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
     * @return Response
     */
    public function eclate(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'vanne-spherique', 'eclate-vanne-spherique');
    }
}
