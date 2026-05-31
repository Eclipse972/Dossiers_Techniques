<?php

use DossiersTechniques\Controleur\AutrePageControleur;
use Slim\App; // ou le type réel de $app

// Controleurs des supports
use DossiersTechniques\Controleur\AlternateurControleur;
use DossiersTechniques\Controleur\BoutonPoussoirControleur;

/** @var App $app */
$app->get('/', [AutrePageControleur::class, 'accueil']);

// dossier technique de l'alternateur
$app->get('/alternateur/mise-en-situation', [AlternateurControleur::class, 'miseEnSituation']);

// dossier technique du bouton poussoir
$app->get('/bouton-poussoir/mise-en-situation', [BoutonPoussoirControleur::class, 'miseEnSituation']);