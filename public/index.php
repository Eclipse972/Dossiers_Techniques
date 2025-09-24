<?php
// Active les erreurs en production (à désactiver après les tests)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Charge l'autoloader
require __DIR__ . '/../vendor/autoload.php';

// Importations nécessaires
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Eclipse972\DossiersTechniques\Controllers\HomeController;
use Eclipse972\DossiersTechniques\Controllers\ListeController;

// Initialise Slim
$app = AppFactory::create();

// Configuration de Twig
$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

// Ajoute Twig à l'application (pour les contrôleurs)
$app->getContainer()->set('twig', $twig);

// Routes
$app->get('/', [HomeController::class, 'index']);
// Démarre l'application
$app->run();
