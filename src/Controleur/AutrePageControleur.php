<?php
/**
 * Contrôleur pour les pages générales de l'application
 * (accueil, contact, etc.).
 *
 * Gère les requêtes HTTP qui ne concernent pas
 * un dossier technique spécifique.
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
     * @return Response La réponse avec le rendu du template accueil.twig
     */
    public function accueil(Request $requete, Response $reponse): Response
    {
        return $this->vue->render($reponse, 'accueil.twig');
    }
}
