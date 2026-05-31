<?php
/**
 * Contrôleur pour les pages autres que celles d'un dossier technique
 * 	- page d'accueil
 * 	- formulaire de contact
 * 	- etc
 */

namespace DossiersTechniques\Controleur;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class AutrePageControleur
{
    /**
     * Constructeur : injection du moteur de templates.
     *
     * Utilise la promotion de propriété PHP 8 : le mot clé
     * `private` dans les paramètres déclare et initialise
     * automatiquement la propriété $vue, ce qui évite
     * d'écrire $this->vue = $vue; dans le corps du constructeur.
     *
     * @param Twig $vue Moteur de templates Twig
     */
    public function __construct(private Twig $vue) {}

    /**
     * Affiche la page d'accueil de l'application.
     *
     * @param Request  $requete  Requête HTTP entrante
     * @param Response $reponse  Réponse HTTP à retourner
     *
     * @return Response La réponse avec le rendu du template home.html.twig
     */
    public function accueil(Request $requete, Response $reponse): Response
    {
        $listeSupport = [ // données de chaque support classés par ordre alphabétique
            ['nom' => 'Alternateur',			'image' => 'alternateur.png',       'dossier' => 'alternateur'],
            ['nom' => 'Bouton poussoir',		'image' => 'BP.png',                'dossier' => 'bouton-poussoir'],
            ['nom' => 'Bride à nez',			'image' => 'bride.png',				'dossier' => 'bride-a-nez'],
            ['nom' => 'Bride hydraulique',		'image' => 'bride.png',				'dossier' => 'bride-hydraulique'],
            ['nom' => 'Butée 5 axes',			'image' => 'butee.png',		        'dossier' => 'butee-5-axes'],
            ['nom' => 'Cambreuse',				'image' => 'cambreuse.png',         'dossier' => 'cambreuse'],
            ['nom' => 'Casse-noix',				'image' => 'casseNoix.png',			'dossier' => 'casse_noix'],
            ['nom' => 'Coupe-tube',				'image' => 'mini_coupe-tube.png',	'dossier' => 'coupe-tube'],
            ['nom' => 'Cric bouteille',			'image' => 'cric.png',				'dossier' => 'cric-bouteille'],
            ['nom' => 'Cric hydraulique',		'image' => 'cric.png',				'dossier' => 'cric-hydraulique'],
            ['nom' => 'Électrovanne',			'image' => 'electrovanne.png',      'dossier' => 'electrovanne'],
            ['nom' => 'Étau',					'image' => 'etau.png',				'dossier' => 'etau'],
            ['nom' => 'Extracteur de roulement','image' => 'extracteur.png',		'dossier' => 'extracteur-de-roulement'],
            ['nom' => 'Frein à disque',			'image' => 'frein.png',				'dossier' => 'frein-a-disque'],
            ['nom' => 'Moteur de modélisme',	'image' => 'moteur.png',			'dossier' => 'moteur-de-modelisme'],
            ['nom' => 'Pince de marquage',		'image' => 'pince.png', 			'dossier' => 'pince-de-marquage'],
            ['nom' => 'Pince de robot',			'image' => 'pince.png',				'dossier' => 'pince-de-robot'],
            ['nom' => 'Pompe à palettes',		'image' => 'pompe.png',				'dossier' => 'pompe-a-palettes'],
            ['nom' => 'Préhenseur de culasse',	'image' => 'prehenseur.png',        'dossier' => 'prehenseur'],
            ['nom' => 'Unité de marquage',		'image' => 'unite2marquage.png',    'dossier' => 'unite-de-marquage'],
            ['nom' => 'Vanne sphérique',		'image' => 'vanne.png',             'dossier' => 'vanne'],
        ];

        return $this->vue->render($reponse, '121-home.html.twig',  [
                    'title'				=> 'DT de ChristopHe',
                    'header'			=> 'Les dossiers techniques en ligne de ChristopHe',
                    'logo_url'			=> '/images/logo.png',
                    'logo_description'	=> 'LOGO',
                    'app_data'			=> $listeSupport
                ]);
    }
}
