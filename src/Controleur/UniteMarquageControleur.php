<?php
/**
 * Contrôleur de l' unité de marquage
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

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
        return $this->renduMES($reponse);
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
        return $reponse;
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
        return $reponse;
    }
}
