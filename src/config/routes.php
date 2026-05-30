<?php

use DossiersTechniques\Controleur\AutrePageControleur;
use Slim\App; // ou le type réel de $app

// Controleurs des supports
use DossiersTechniques\Controleur\AlternateurControleur;

/** @var App $app */
$app->get('/', [AutrePageControleur::class, 'accueil']);

// dossier technique de l'alternateur
$app->get('/alternateur/mise-en-situation', [AlternateurControleur::class, 'miseEnSituation']);