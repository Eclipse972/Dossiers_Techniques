<?php
/**
 * Contrôleur de l'alternateur
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class BoutonPoussoirControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support Alternateur.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('bouton poussoir', "du ", 'bouton-poussoir', 'BP.png');
    }

    /**
     * Affiche la page 'à propos' du bouton poussoir
     *
     * @route /bouton-pousssoir
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
		$listeLien = [];
		self::ajouteLien($listeLien,'http://laparrej.free.fr/pro_sw.htm#b', "site de l'auteur");
        return $this->renduApropos(
			$reponse,
			'BP.zip',
			[
				'configuration contenant un écorché',
				'sous-ensembles fixe et mobile',
			],
			$listeLien
		);
    }

    /**
     * Affiche la page de mise en situation de l'alternateur.
     *
     * @route /alternateur/mise-en-situation
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
     * @route /alternateur/dessin-densemble
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
	 * Affiche la page de nomenclature du bouton poussoir.
	 *
	 * @route /bouton-poussoir/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Corps',				1,	'Corps.EPRT',				'PF 21 (Bakélite)');
		Nomenclature::ajouterLigne(2,	'Borne',				2,	'borne.EPRT',				'Cu Zn 15');
		Nomenclature::ajouterLigne(3,	'Vis CS M2-4',			4,	'Vis_CS.EPRT',				'Cu Zn 39 Pb 2');
		Nomenclature::ajouterLigne(4,	'Fourreau',				1,	'Fourreau.EPRT',			'Cu Zn 39 Pb 2');
		Nomenclature::ajouterLigne(5,	'Écrou H M12-1',		1,	'Ecrou_H.EPRT',				'Cu Zn 15');
		Nomenclature::ajouterLigne(6,	'Écrou moleté',			1,	'Ecrou_molete.EPRT',		'Cu Zn 15');
		Nomenclature::ajouterLigne(7,	'Ressort',				1,	'Ressort.EPRT',				'45 Si 8');
		Nomenclature::ajouterLigne(8,	'Rondelle de contact',	1,	'Rondelle.EPRT',			'Cu Zn 15');
		Nomenclature::ajouterLigne(9,	'Cylindre de poussée',	1,	'Cylindre.EPRT',			'PF 21 (Bakélite)');
		Nomenclature::ajouterLigne(10,	'Vis FS M2.5-18',		1,	'Vis_FS.EPRT',				'Cu Zn 39 Pb 2');
		Nomenclature::ajouterLigne(11,	'Poussoir',				1,	'Poussoir.EPRT',			'S 235 (E24)');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
     * Affiche la page du diagramme pieuvre.
     *
	 * @route /bouton-poussoir/pieuvre
	 * 
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function pieuvre(Request $requete, Response $reponse): Response
    {
        return $this->vue->render($reponse, '112-pageDT.html.twig', [
			'support'	=> $this->nom,
			'du'		=> $this->article_du,
			'dossier'	=> $this->dossier,
			'logo'		=> $this->logo,
			'fichier'	=> 'pieuvre',
		]);
    }

    /**
     * Affiche la page de l'éclaté.
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function eclate(Request $requete, Response $reponse): Response
    {
        return $this->renduEclate($reponse, 'bouton-poussoir', 'eclate-bouton-poussoir');
    }
}
