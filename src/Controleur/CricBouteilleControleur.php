<?php
/**
 * Contrôleur du cric bouteille
 */
namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use DossiersTechniques\Modele\Nomenclature;

class CricBouteilleControleur extends SupportControleur
{
    /**
     * Constructeur : initialise le support cric bouteille.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(Twig $vue)
    {
        parent::__construct($vue);
        $this->hydrate('cric bouteille', "du ", 'cric-bouteille', 'cric.png');
    }

    /**
     * Affiche la page 'à propos' du cric bouteille
     *
     * @route /cric-bouteille
     *
     * @param Request  $requete Requête HTTP entrante
     * @param Response $reponse Réponse HTTP à retourner
	 *
     * @return Response
     */
    public function aPropos(Request $requete, Response $reponse): Response {
        return $this->renduApropos(
			$reponse,
			'cric-bouteille.zip',
			[
				"le fichier s'apelle Assemblage2",
				"la maquette est mobile",
				"pas de simulation des clapets"
			],
			[]
		);
    }

    /**
     * Affiche la page de mise en situation du cric bouteille.
     *
     * @route /cric-bouteille/mise-en-situation
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
     * Affiche la page du dessin d'ensemble du cric bouteille.
     *
     * @route /cric-bouteille/dessin-densemble
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
	 * Affiche la page de nomenclature du cric bouteille.
	 *
	 * @route /cric_bouteille/nomenclature
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function nomenclature(Request $requete, Response $reponse): Response
	{
		Nomenclature::creer();
		Nomenclature::ajouterLigne(1,	'Embase de cric',						1,	'Embase.EPRT',				'EN AW 2017');
		Nomenclature::ajouterLigne(2,	'Corps de pompe',						1,	'Corps2pompe.EPRT',			'EN AW 2017');
		Nomenclature::ajouterLigne(3,	'Piston de pompe',						1,	'piston_pompe.EPRT',		'S 235 (E24)');
		Nomenclature::ajouterLigne(4,	'Axe d\'articulation',					2,	'axe_articulation.EPRT',	'S 235 (E24)');
		Nomenclature::ajouterLigne(5,	'Segment d\'arrêt radial 6 x 0,7',		4,	'segment_arret.EPRT');
		Nomenclature::ajouterLigne(6,	'Articulation',							1,	'articulation.EPRT',		'EN AW 2017');
		Nomenclature::ajouterLigne(7,	'Piston récepteur',						1,	'piston_recepteur.EPRT',	'EN AW 2017');
		Nomenclature::ajouterLigne(8,	'Couvercle',							1,	'Couvercle.EPRT',			'EN AW 2017');
		Nomenclature::ajouterLigne(9,	'Cylindre principal',					1,	'cylindre_principal.EPRT',	'PMMA',			'Polyméthylméthacrylate');
		Nomenclature::ajouterLigne(10,	'Réservoir',							1,	'reservoir.EPRT',			'PMMA',			'Polyméthylméthacrylate');
		Nomenclature::ajouterLigne(11,	'Écrou M4',								4,	'ecrouM4.EPRT');
		Nomenclature::ajouterLigne(12,	'Rondelle M4',							4,	'rondelleM4.EPRT');
		Nomenclature::ajouterLigne(13,	'Tirant',								4,	'tirant.EPRT',				'S 235 (E24)');
		Nomenclature::ajouterLigne(14,	'Biellette',							1,	'biellette.EPRT',			'S 235 (E24)');
		Nomenclature::ajouterLigne(15,	'Axe d\'articulation de chape',			1,	'axe_chape.EPRT');
		Nomenclature::ajouterLigne(16,	'Pointeau',								1,	'pointeau.EPRT',			'',				'Vis sans tête à bout plat HC M10-30 modifiée');
		Nomenclature::ajouterLigne(17,	'Joint de pointeau de retour',			1,	'joint2pointeau.EPRT');
		Nomenclature::ajouterLigne(18,	'Chandelle',							1,	'Chandelle.EPRT',			'EN AW 2017');
		Nomenclature::ajouterLigne(19,	'Bille de tarage',						1,	'bille_tarage.EPRT');
		Nomenclature::ajouterLigne(20,	'Poussoir de tarage',					1,	'poussoir2tarage.EPRT',		'S 235 (E24)');
		Nomenclature::ajouterLigne(21,	'Ressort de tarage',					1,	'ressort2tarage.EPRT',		'C 60');
		Nomenclature::ajouterLigne(22,	'Vis de tarage',						1,	'vis2tarage.EPRT',			'S 235 (E24)');
		Nomenclature::ajouterLigne(23,	'Bouchon de tarage',					1,	'bouchon_tarage.EPRT');
		Nomenclature::ajouterLigne(24,	'Joint plat de bouchon de tarage',		1,	'joint2tarage.EPRT');
		Nomenclature::ajouterLigne(25,	'Bouchon de remplissage',				1,	'bouchon2remplissage.EPRT');
		Nomenclature::ajouterLigne(26,	'Bille d\'admission',					1,	'bille_admission.EPRT');
		Nomenclature::ajouterLigne(27,	'Joint de pompe',						1,	'joint2pompe.EPRT');
		Nomenclature::ajouterLigne(28,	'Joint torique de piston',				1,	'joint2piston.EPRT');
		Nomenclature::ajouterLigne(29,	'Vis de fixation du corps de pompe',	1,	'vis2fixation_du_corps2pompe.EPRT');
		Nomenclature::ajouterLigne(30,	'Levier',								1,	'levier.EPRT',				'S 235 (E24)');
		Nomenclature::ajouterLigne(31,	'Joint torique de réservoir',			1,	'joint2reservoir.EPRT');
		Nomenclature::ajouterLigne(32,	'Joint torique de corps de pompe',		1,	'joint_torique2corps2pompe.EPRT');
		return $this->renduNomenclature($reponse, Nomenclature::preparerVue($this->dossier));
	}

	/**
	 * Affiche la page de fonctionnement
	 *
	 * @route /cric-bouteille/fonctionnement
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnement(Request $requete, Response $reponse): Response
	{
		return $this->renduFonctionnement($reponse);
	}

	/**
	 * Affiche la page de la montée
	 *
	 * @route /cric-bouteille/fonctionnement/monte
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnementMonte(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page de la descente
	 *
	 * @route /cric-bouteille/fonctionnement/descend
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function fonctionnementDescend(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page d'analyse fonctionnelle
	 *
	 * @route /cric-bouteille/analyse-fonctionnelle
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function analyseFonctionnelle(Request $requete, Response $reponse): Response
	{
		$texte =
		"<p><b>FP</b> : Soulever une charge</p>
		<p><b>FC1</b> : Transformer l&apos;&eacute;nergie m&eacute;canique de l&apos;utilisateur</p>
		<p><b>FC2</b> : S&apos;adapter aux dimensions de la charge</p>
		<p><b>FC3</b> : R&eacute;sister aux efforts transmissibles</p>
		<p><b>FC4</b> : &Ecirc;tre facilement manipulable</p>
		<p><b>FC5</b> : &Eacute;viter le levage de charges trop lourdes</p>
		<p><b>FC6</b> : S&apos;adapter au milieu ext&eacute;rieur</p>";

		return $this->renduPageImage(
			$reponse,
			"Analyse fonctionnelle",
			"",
			'pieuvre.png',
			"pieuvre du cric bouteille",
			$texte,
			400
		);
	}

	/**
	 * Affiche la page de l'éclaté
	 *
	 * @route /cric-bouteille/eclate
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function eclate(Request $requete, Response $reponse): Response
	{
		return $this->renduEclate($reponse, 'cric-bouteille', 'eclate-cric-bouteille');
	}

	/**
	 * Affiche la page des dessins de définition
	 *
	 * @route /cric-bouteille/dessin-definition
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinition(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition de l'axe d'articulation
	 *
	 * @route /cric-bouteille/dessin-definition/axe-articulation
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionAxeArticulation(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition de la biellette
	 *
	 * @route /cric-bouteille/dessin-definition/biellette
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionBiellette(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition de la chandelle
	 *
	 * @route /cric-bouteille/dessin-definition/chandelle
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionChandelle(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition de la chape
	 *
	 * @route /cric-bouteille/dessin-definition/chape
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionChape(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition du corps de pompe
	 *
	 * @route /cric-bouteille/dessin-definition/corps-pompe
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionCorpsPompe(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition du cylindre principal
	 *
	 * @route /cric-bouteille/dessin-definition/cylindre-principal
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionCylindrePrincipal(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition de l'embase
	 *
	 * @route /cric-bouteille/dessin-definition/embase
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionEmbase(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition du levier
	 *
	 * @route /cric-bouteille/dessin-definition/levier
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionLevier(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition du piston de pompe
	 *
	 * @route /cric-bouteille/dessin-definition/piston-pompe
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionPistonPompe(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition du piston récepteur
	 *
	 * @route /cric-bouteille/dessin-definition/piston-recepteur
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionPistonRecepteur(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition du pointeau
	 *
	 * @route /cric-bouteille/dessin-definition/pointeau
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionPointeau(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition des éléments de tarage
	 *
	 * @route /cric-bouteille/dessin-definition/tarage
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionTarage(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition du réservoir
	 *
	 * @route /cric-bouteille/dessin-definition/reservoir
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionReservoir(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}

	/**
	 * Affiche la page du dessin de définition du tirant M4
	 *
	 * @route /cric-bouteille/dessin-definition/tirantM4
	 *
	 * @param Request  $requete Requête HTTP entrante
	 * @param Response $reponse Réponse HTTP à retourner
	 *
	 * @return Response
	 */
	public function dessinDefinitionTirantM4(Request $requete, Response $reponse): Response
	{
		return $this->renduPageEnConstruction($requete, $reponse);
	}
}
