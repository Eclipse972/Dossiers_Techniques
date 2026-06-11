<?php
/**
 * Contrôleur du coupe-tube
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class CoupeTubeControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support mini coupe-tube.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('mini coupe-tube', "du ", 'coupe-tube', 'mini_coupe-tube.png');
    }

	/**
     * Affiche la page 'à propos'
     *
     * @route /coupe-tube
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        $listeLien = [];
		self::ajouteLien($listeLien,'https://www.leroymerlin.fr/produits/coupe-tubes-minicut-i-pro-minicut-ii-pro-pour-de-tuyaux-3-16-mm-88326399.html', "chez Leroy Merlin");
        return $this->renduApropos(
			$reponse,
			'mini-coupe-tube.zip',
			["contient aussi d'autres miseen plan"],
			$listeLien
		);
    }

    /**
     * Affiche la page de mise en situation du coupe-tube.
     *
     * @route /coupe-tube/mise-en-situation
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function miseEnSituation(Request $requete, Response $reponse): Response
    {
        return $this->renduMES($reponse);
    }

    /**
     * Affiche la page du dessin d'ensemble du coupe-tube.
     *
     * @route /coupe-tube/dessin-densemble
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
	 * Affiche la page de nomenclature du mini coupe-tube.
	 *
	 * @route /mini_coupe-tube/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Corps',							1,	'corps.EPRT');
		Nomenclature::ajouterLigne(2,	'Coulisseau',						1,	'coulisseau.EPRT');
		Nomenclature::ajouterLigne(3,	'Rouleau',							2,	'rouleau.EPRT');
		Nomenclature::ajouterLigne(4,	'Axe de rouleau',					2,	'axe2rouleau.EPRT');
		Nomenclature::ajouterLigne(5,	'Molette',							1,	'molette.EPRT');
		Nomenclature::ajouterLigne(6,	'Axe de molette',					1,	'axe2molette.EPRT');
		Nomenclature::ajouterLigne(7,	'Axe de manoeuvre',					1,	'axe2manoeuvre.EPRT');
		Nomenclature::ajouterLigne(8,	'Anneau élastique d\'arbre',		1,	'anneau_elastique.EPRT');
		Nomenclature::ajouterLigne(9,	'Bouton de manoeuvre',				1,	'bouton2manoeuvre.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
	 * Affiche la page du diagramme A-0
	 *
	 * @route /coupe-tube/diagramme-A-0
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function diagrammeA0(Request $requete, Response $reponse): Response
	{
		return $this->renduPageImage(
			$reponse,
			"Analyse fonctionnelle",
			"",
			'diagrammeA-0.png',
			"diagramme A-0",
			"",
			400
		);
	}

	/**
	 * Affiche la page de l'éclaté
	 *
	 * @route /coupe-tube/eclate
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function eclate(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'coupe-tube', 'eclate-coupe-tube');
	}
}
