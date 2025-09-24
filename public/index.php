<?php
// Active les erreurs en développement (à désactiver en prod)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Charge l'autoloader
require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Eclipse972\DossiersTechniques\Controllers\PageController;

// Initialise Slim
$app = AppFactory::create();

// Configuration de Twig (avec cache pour la prod)
$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader, [
    'cache' => __DIR__ . '/../cache',
]);

// Ajoute Twig au conteneur
$app->getContainer()->set('twig', $twig);

// Route pour l'accueil (version avec typage explicite)
$app->get('/', function (Request $request, Response $response) use ($twig) {
    $controller = new PageController($twig);
    return $controller->accueil($response);
});

// Démarre l'application
$app->run();
