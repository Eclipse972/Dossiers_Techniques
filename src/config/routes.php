<?php

use DossiersTechniques\Controleur\AutrePageControleur;
use Slim\App; // ou le type réel de $app

/** @var App $app */
$app->get('/', [AutrePageControleur::class, 'accueil']);