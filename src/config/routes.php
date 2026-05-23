<?php

use DossiersTechniques\Controleur\AutrePageControleur;

$app->get('/', [AutrePageControleur::class, 'accueil']);