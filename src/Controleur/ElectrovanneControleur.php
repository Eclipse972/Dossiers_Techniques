<?php
/**
 * Contrôleur de l'électrovanne
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;
use DossiersTechniques\Modele\Lien;

class ElectrovanneControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support électrovanne.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('électrovanne', "de l'", 'electrovanne', 'electrovanne.png');
    }

    /**
     * Affiche la page 'à propos'
     *
     * @route /electrovanne
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
	public function aPropos(Request $requete, Response $reponse): Response {
		Lien::creer();
		Lien::ajouter('http://laparrej.free.fr/pro_sw.htm#e', "site de Jérôme Laparre");
		return $this->renduApropos(
			$reponse,
			'electrovanne.zip',
			[
				"une des configurations est un écorché",
				"la maquette est fixe",
				"contient les dessins de définition"
			],
			Lien::obtenir()
		);
	}

    /**
     * Affiche la page de mise en situation de l'électrovanne.
     *
     * @route /electrovanne/mise-en-situation
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
     * Affiche la page du dessin d'ensemble de l'électrovanne.
     *
     * @route /electrovanne/dessin-densemble
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
	 * Affiche la page de nomenclature de l'électrovanne.
	 *
	 * @route /electrovanne/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Corps',			1,	'corps.EPRT');
		Nomenclature::ajouterLigne(2,	'Membrane',			1,	'membrane.EPRT');
		Nomenclature::ajouterLigne(3,	'Joint torique',	2,	'joint_torique.EPRT');
		Nomenclature::ajouterLigne(4,	'Noyau',			1,	'noyau.EPRT');
		Nomenclature::ajouterLigne(5,	'Ressort',			1,	'ressort.EPRT');
		Nomenclature::ajouterLigne(6,	'Support',			1,	'support.EPRT');
		Nomenclature::ajouterLigne(7,	'Axe guide',		1,	'axe_guide.EPRT');
		Nomenclature::ajouterLigne(8,	'Bobine',			1,	'bobine.EPRT');
		Nomenclature::ajouterLigne(9,	'Boitier',			1,	'boitier.EPRT');
		Nomenclature::ajouterLigne(10,	'Vis CHc M5-25',	1,	'vis.EPRT');
		Nomenclature::ajouterLigne(11,	'Écrou',			1,	'ecrou.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
	 * Affiche la page de fonctionnement
	 *
	 * @route /electrovanne/fonctionnement
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnement(Request $requete, Response $reponse): Response
	{
		return $this->renduPageOrdinaire($reponse, 'fonctionnement.html.twig');
	}

	/**
	 * Affiche la page d'analyse fonctionnelle
	 *
	 * @route /electrovanne/analyse-fonctionnelle
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function analyseFonctionnelle(Request $requete, Response $reponse): Response
	{
		$au_dessus="
			<h1>Analyse fonctionnelle</h1>
			<p>L'environnement de l'électro-vanne est le suivant :</p>
			<ul>
				<li>le micro ordinateur &agrave; travers un circuit de commande</li>
				<li>le circuit hydraulique</li>
				<li>l'environnement extérieur</li>
			</ul>
			<p>Le diagramme pieuvre de l'électrovanne est le suivant:</p>";

		$en_dessous="
			<p>Fonctions de l'électro-vanne :</p>
			<ul>
				<li>Fp : commander l'ouverture et la fermeture d'un circuit hydraulique à l'aide d'un micro-ordinateur.</li>
				<li>F1 : ne pas inonder le milieu extérieur.</li>
				<li>F2 : s'adapter à l'orifice d'entrée du circuit hydraulique.</li>
				<li>F3 : s'adapter à l'orifice de sortie du circuit hydraulique.</li>
			</ul>
		";

		return $this->renduPageImage(
			$reponse,
			"Analyse fonctionnelle",
			$au_dessus,
			'pieuvre.png',
			"pieuvre de l'électrovanne",
			$en_dessous,
			300
		);
	}
}
