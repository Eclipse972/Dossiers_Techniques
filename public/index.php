<?php

# forcer l'affichage des erreurs pour le site de developpement
if (substr(__DIR__, 18, 3) == 'dev') {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}

require_once __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;

// --- Conteneur de dépendances ---
$conteneur = require __DIR__ . '/../src/config/dependances.php';

// --- Création de l'application Slim ---
AppFactory::setContainer($conteneur);
$app = AppFactory::create();

// --- Enregistrement des routes ---
require __DIR__ . '/../src/config/routes.php';

// --- Lancement ---
$app->run();