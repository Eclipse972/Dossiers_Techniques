<?php

use DossiersTechniques\Controleur\AutrePageControleur;

// Controleurs des supports
use DossiersTechniques\Controleur\AlternateurControleur;
use DossiersTechniques\Controleur\BoutonPoussoirControleur;
use DossiersTechniques\Controleur\BrideAnezControleur;
use DossiersTechniques\Controleur\BrideHydrauliqueControleur;
use DossiersTechniques\Controleur\Butee5axesControleur;
use DossiersTechniques\Controleur\CambreuseControleur;
use DossiersTechniques\Controleur\CasseNoixControleur;
use DossiersTechniques\Controleur\CoupeTubeControleur;
use DossiersTechniques\Controleur\CricBouteilleControleur;
use DossiersTechniques\Controleur\CricHydrauliqueControleur;
use DossiersTechniques\Controleur\ElectrovanneControleur;
use DossiersTechniques\Controleur\EtauControleur;
use DossiersTechniques\Controleur\ExtracteurRoulementControleur;
use DossiersTechniques\Controleur\FreinDisqueControleur;
use DossiersTechniques\Controleur\MoteurModelismeControleur;
use DossiersTechniques\Controleur\PinceMarquageControleur;
use DossiersTechniques\Controleur\PinceRobotControleur;
use DossiersTechniques\Controleur\PompePalettesControleur;
use DossiersTechniques\Controleur\PrehenseurCulasseControleur;
use DossiersTechniques\Controleur\UniteMarquageControleur;
use DossiersTechniques\Controleur\VanneSpheriqueControleur;

use Slim\App;
/** @var App $app */

$app->get('/', [AutrePageControleur::class, 'accueil']);

// dossier technique de l'alternateur
$app->get('/alternateur', [AlternateurControleur::class, 'aPropos']);
$app->get('/alternateur/mise-en-situation', [AlternateurControleur::class, 'miseEnSituation']);

// dossier technique du bouton poussoir
$app->get('/bouton-poussoir/mise-en-situation', [BoutonPoussoirControleur::class, 'miseEnSituation']);

// dossier technique de la bride à nez
$app->get('/bride-a-nez/mise-en-situation', [BrideAnezControleur::class, 'miseEnSituation']);


// dossier technique de la bride à nez
$app->get('/bride-hydraulique/mise-en-situation', [BrideHydrauliqueControleur::class, 'miseEnSituation']);

// dossier technique de la butée 5 axes
$app->get('/butee-5-axes/mise-en-situation', [Butee5axesControleur::class, 'miseEnSituation']);

// dossier technique de la cambreuse
$app->get('/cambreuse/mise-en-situation', [CambreuseControleur::class, 'miseEnSituation']);

// dossier technique du casse-noix
$app->get('/casse-noix/mise-en-situation', [CasseNoixControleur::class, 'miseEnSituation']);

// dossier technique du mini coupe-tube
$app->get('/coupe-tube/mise-en-situation', [CoupeTubeControleur::class, 'miseEnSituation']);

// dossier technique du cric bouteille
$app->get('/cric-bouteille/mise-en-situation', [CricBouteilleControleur::class, 'miseEnSituation']);

// dossier technique du cric hydraulique
$app->get('/cric-hydraulique/mise-en-situation', [CricHydrauliqueControleur::class, 'miseEnSituation']);

// dossier technique de l'électrovanne
$app->get('/electrovanne/mise-en-situation', [ElectrovanneControleur::class, 'miseEnSituation']);

// dossier technique de l'étau
$app->get('/etau/mise-en-situation', [EtauControleur::class, 'miseEnSituation']);

// dossier technique de l'extracteur de roulement
$app->get('/extracteur-de-roulement/mise-en-situation', [ExtracteurRoulementControleur::class, 'miseEnSituation']);

// dossier technique du frein à disque
$app->get('/frein-a-disque/mise-en-situation', [FreinDisqueControleur::class, 'miseEnSituation']);

// dossier technique du moteur de modélisme
$app->get('/moteur-de-modelisme/mise-en-situation', [MoteurModelismeControleur::class, 'miseEnSituation']);

// dossier technique de la pince de marquage
$app->get('/pince-de-marquage/mise-en-situation', [PinceMarquageControleur::class, 'miseEnSituation']);

// dossier technique de la pince de robot
$app->get('/pince-de-robot/mise-en-situation', [PinceRobotControleur::class, 'miseEnSituation']);

// dossier technique de la pompe à palettes
$app->get('/pompe-a-palettes/mise-en-situation', [PompePalettesControleur::class, 'miseEnSituation']);

// dossier technique du préhenseur de culasse
$app->get('/prehenseur-de-culasse/mise-en-situation', [PrehenseurCulasseControleur::class, 'miseEnSituation']);

// dossier technique de l'unité de marquage
$app->get('/unite-de-marquage/mise-en-situation', [UniteMarquageControleur::class, 'miseEnSituation']);

// dossier technique de la vanne sphérique
$app->get('/vanne-spherique/mise-en-situation', [VanneSpheriqueControleur::class, 'miseEnSituation']);
