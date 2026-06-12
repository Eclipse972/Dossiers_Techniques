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

// liste des supports
$app->get('/', [AutrePageControleur::class, 'accueil']);

// dossier technique de l'alternateur
$app->group('/alternateur', function($group) {
    $group->get('',						[AlternateurControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',	[AlternateurControleur::class, 'miseEnSituation']);
    $group->get('/dessin-densemble',	[AlternateurControleur::class, 'dessinDensemble']);
    $group->get('/eclate',				[AlternateurControleur::class, 'eclate']);
    $group->get('/nomenclature',		[AlternateurControleur::class, 'nomenclature']);
});

// dossier technique du bouton poussoir
$app->group('/bouton-poussoir', function($group) {
    $group->get('',                    [BoutonPoussoirControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',  [BoutonPoussoirControleur::class, 'miseEnSituation']);
    $group->get('/pieuvre',            [BoutonPoussoirControleur::class, 'pieuvre']);
    $group->get('/dessin-densemble',   [BoutonPoussoirControleur::class, 'dessinDensemble']);
    $group->get('/eclate',             [BoutonPoussoirControleur::class, 'eclate']);
    $group->get('/nomenclature',       [BoutonPoussoirControleur::class, 'nomenclature']);
});

// dossier technique de la bride à nez
$app->group('/bride-a-nez', function($group) {
    $group->get('',										[BrideAnezControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',					[BrideAnezControleur::class, 'miseEnSituation']);
    $group->get('/fonctionnement',						[BrideAnezControleur::class, 'fonctionnement']);
    $group->get('/fonctionnement/debut-phase1',			[BrideAnezControleur::class, 'fonctionnementDebutPhase1']);
    $group->get('/fonctionnement/phase1',				[BrideAnezControleur::class, 'fonctionnementPhase1']);
    $group->get('/fonctionnement/debut-phase2',			[BrideAnezControleur::class, 'fonctionnementDebutPhase2']);
    $group->get('/fonctionnement/phase2',				[BrideAnezControleur::class, 'fonctionnementPhase2']);
    $group->get('/caracteristiques',					[BrideAnezControleur::class, 'caracteristiques']);
    $group->get('/montage-bridage',						[BrideAnezControleur::class, 'montageBridage']);
    $group->get('/dessin-densemble',					[BrideAnezControleur::class, 'dessinDensemble']);
    $group->get('/classe-equivalence',					[BrideAnezControleur::class, 'classeEquivalence']);
    $group->get('/classe-equivalence/corps-bride',		[BrideAnezControleur::class, 'SEcorpsBride']);
    $group->get('/classe-equivalence/nez-bride', 		[BrideAnezControleur::class, 'SEnezBride']);
    $group->get('/classe-equivalence/ensemble-piston',	[BrideAnezControleur::class, 'SEensemblePiston']);
    $group->get('/classe-equivalence/plaquette',		[BrideAnezControleur::class, 'SEplaquette']);
    $group->get('/classe-equivalence/ressort',			[BrideAnezControleur::class, 'SEressort']);
    $group->get('/nomenclature',						[BrideAnezControleur::class, 'nomenclature']);
    $group->get('/eclate-montage',						[BrideAnezControleur::class, 'eclateMontage']);
});

// dossier technique de la bride hydraulique
$app->group('/bride-hydraulique', function($group) {
    $group->get('', 					[BrideHydrauliqueControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',	[BrideHydrauliqueControleur::class, 'miseEnSituation']);
	$group->get('/fonctionnement',		[BrideHydrauliqueControleur::class, 'fonctionnement']);
    $group->get('/dessin-densemble',	[BrideHydrauliqueControleur::class, 'dessinDensemble']);
    $group->get('/nomenclature',		[BrideHydrauliqueControleur::class, 'nomenclature']);
});

// dossier technique de la butée 5 axes
$app->group('/butee-5-axes', function($group) {
    $group->get('',                                 [Butee5axesControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',               [Butee5axesControleur::class, 'miseEnSituation']);
    $group->get('/axes',                            [Butee5axesControleur::class, 'axes']);
    $group->get('/axes/axe1',                       [Butee5axesControleur::class, 'axe1']);
    $group->get('/axes/axe2',                       [Butee5axesControleur::class, 'axe2']);
    $group->get('/axes/axe3',                       [Butee5axesControleur::class, 'axe3']);
    $group->get('/axes/axe4',                       [Butee5axesControleur::class, 'axe4']);
    $group->get('/axes/axe5',                       [Butee5axesControleur::class, 'axe5']);
    $group->get('/dessin-densemble',                [Butee5axesControleur::class, 'dessinDensemble']);
    $group->get('/eclate',                          [Butee5axesControleur::class, 'eclate']);
    $group->get('/nomenclature',                    [Butee5axesControleur::class, 'nomenclature']);
    $group->get('/dessin-definition',               [Butee5axesControleur::class, 'dessinDefinition']);
    $group->get('/dessin-definition/socle',         [Butee5axesControleur::class, 'dessinDefinitionSocle']);
    $group->get('/dessin-definition/contre-embase', [Butee5axesControleur::class, 'dessinDefinitionContreEmbase']);
});

// dossier technique de la cambreuse
$app->group('/cambreuse', function($group) {
	$group->get('',									[CambreuseControleur::class, 'aPropos']);
	$group->get('/mise-en-situation',				[CambreuseControleur::class, 'miseEnSituation']);
	$group->get('/fonctionnement',					[CambreuseControleur::class, 'fonctionnement']);
	$group->get('/fonctionnement/etape1',			[CambreuseControleur::class, 'fonctionnementEtape1']);
	$group->get('/fonctionnement/etape2',			[CambreuseControleur::class, 'fonctionnementEtape2']);
	$group->get('/fonctionnement/etape3',			[CambreuseControleur::class, 'fonctionnementEtape3']);
	$group->get('/caracteristiques',				[CambreuseControleur::class, 'caracteristiques']);
	$group->get('/dessin-densemble',				[CambreuseControleur::class, 'dessinDensemble']);
	$group->get('/classe-equivalence',				[CambreuseControleur::class, 'eclate']);
	$group->get('/classe-equivalence/bati',			[CambreuseControleur::class, 'SEbati']);
	$group->get('/classe-equivalence/tige-cambrage',[CambreuseControleur::class, 'tigeCambrage']);
	$group->get('/classe-equivalence/tige-bridage',	[CambreuseControleur::class, 'tigeBridage']);
	$group->get('/classe-equivalence/basculeur',	[CambreuseControleur::class, 'SEbasculeur']);
	$group->get('/classe-equivalence/bielle',		[CambreuseControleur::class, 'SEbielle']);
	$group->get('/nomenclature',					[CambreuseControleur::class, 'nomenclature']);
	$group->get('/pieces-detachees',				[CambreuseControleur::class, 'piecesDetachees']);
});

// dossier technique du casse-noix
$app->group('/casse-noix', function($group) {
	$group->get('',						[CasseNoixControleur::class, 'aPropos']);
	$group->get('/mise-en-situation',	[CasseNoixControleur::class, 'miseEnSituation']);
	$group->get('/diagramme-A-0',		[CasseNoixControleur::class, 'diagrammeA0']);
	$group->get('/dessin-densemble',	[CasseNoixControleur::class, 'dessinDensemble']);
	$group->get('/eclate',				[CasseNoixControleur::class, 'eclate']);
	$group->get('/nomenclature',		[CasseNoixControleur::class, 'nomenclature']);
});

// dossier technique du mini coupe-tube
$app->group('/coupe-tube', function($group) {
	$group->get('',						[CoupeTubeControleur::class, 'aPropos']);
	$group->get('/mise-en-situation',	[CoupeTubeControleur::class, 'miseEnSituation']);
	$group->get('/diagramme-A-0',		[CoupeTubeControleur::class, 'diagrammeA0']);
	$group->get('/dessin-densemble',	[CoupeTubeControleur::class, 'dessinDensemble']);
	$group->get('/eclate',				[CoupeTubeControleur::class, 'eclate']);
	$group->get('/nomenclature',		[CoupeTubeControleur::class, 'nomenclature']);
});

// dossier technique du cric bouteille
$app->group('/cric-bouteille', function($group) {
	$group->get('',										[CricBouteilleControleur::class, 'aPropos']);
	$group->get('/mise-en-situation',					[CricBouteilleControleur::class, 'miseEnSituation']);
	$group->get('/fonctionnement',						[CricBouteilleControleur::class, 'fonctionnement']);
	$group->get('/fonctionnement/monte',				[CricBouteilleControleur::class, 'fonctionnementMonte']);
	$group->get('/fonctionnement/descend',				[CricBouteilleControleur::class, 'fonctionnementDescend']);
	$group->get('/analyse-fonctionnelle',				[CricBouteilleControleur::class, 'analyseFonctionnelle']);
	$group->get('/dessin-densemble',					[CricBouteilleControleur::class, 'dessinDensemble']);
	$group->get('/nomenclature',						[CricBouteilleControleur::class, 'nomenclature']);
	$group->get('/eclate',								[CricBouteilleControleur::class, 'eclate']);
	$group->get('/dessin-definition',					[CricBouteilleControleur::class, 'dessinDefinition']);
	$group->get('/dessin-definition/axe-articulation',	[CricBouteilleControleur::class, 'dessinDefinitionAxeArticulation']);
	$group->get('/dessin-definition/biellette',			[CricBouteilleControleur::class, 'dessinDefinitionBiellette']);
	$group->get('/dessin-definition/chandelle',			[CricBouteilleControleur::class, 'dessinDefinitionChandelle']);
	$group->get('/dessin-definition/chape',				[CricBouteilleControleur::class, 'dessinDefinitionChape']);
	$group->get('/dessin-definition/corps-pompe',		[CricBouteilleControleur::class, 'dessinDefinitionCorpsPompe']);
	$group->get('/dessin-definition/cylindre-principal',[CricBouteilleControleur::class, 'dessinDefinitionCylindrePrincipal']);
	$group->get('/dessin-definition/embase',			[CricBouteilleControleur::class, 'dessinDefinitionEmbase']);
	$group->get('/dessin-definition/levier',			[CricBouteilleControleur::class, 'dessinDefinitionLevier']);
	$group->get('/dessin-definition/piston-pompe',		[CricBouteilleControleur::class, 'dessinDefinitionPistonPompe']);
	$group->get('/dessin-definition/piston-recepteur',	[CricBouteilleControleur::class, 'dessinDefinitionPistonRecepteur']);
	$group->get('/dessin-definition/pointeau',			[CricBouteilleControleur::class, 'dessinDefinitionPointeau']);
	$group->get('/dessin-definition/tarage',			[CricBouteilleControleur::class, 'dessinDefinitionTarage']);
	$group->get('/dessin-definition/reservoir',			[CricBouteilleControleur::class, 'dessinDefinitionReservoir']);
	$group->get('/dessin-definition/tirantM4',			[CricBouteilleControleur::class, 'dessinDefinitionTirantM4']);
});

// dossier technique du cric hydraulique
$app->group('/cric-hydraulique', function($group) {
	$group->get('',										[CricHydrauliqueControleur::class, 'aPropos']);
	$group->get('/mise-en-situation',					[CricHydrauliqueControleur::class, 'miseEnSituation']);
	$group->get('/fonctionnement',						[CricHydrauliqueControleur::class, 'fonctionnement']);
	$group->get('/fonctionnement/monte',				[CricHydrauliqueControleur::class, 'fonctionnementMonte']);
	$group->get('/fonctionnement/descend',				[CricHydrauliqueControleur::class, 'fonctionnementDescend']);
	$group->get('/fonctionnement/precautions',			[CricHydrauliqueControleur::class, 'fonctionnementPrecautions']);
	$group->get('/analyse-fonctionnelle',				[CricHydrauliqueControleur::class, 'analyseFonctionnelle']);
	$group->get('/analyse-fonctionnelle/pieuvre',		[CricHydrauliqueControleur::class, 'AFpieuvre']);
	$group->get('/analyse-fonctionnelle/fast-evage',	[CricHydrauliqueControleur::class, 'AFfastEvage']);
	$group->get('/analyse-fonctionnelle/fast-depose',	[CricHydrauliqueControleur::class, 'AFfastDepose']);
	$group->get('/eclate',								[CricHydrauliqueControleur::class, 'eclate']);
	$group->get('/nomenclature',						[CricHydrauliqueControleur::class, 'nomenclature']);
	$group->get('/entretien',							[CricHydrauliqueControleur::class, 'entretien']);
	$group->get('/entretien/probleme-levage',			[CricHydrauliqueControleur::class, 'entretienProblemeLevage']);
	$group->get('/entretien/probleme-descente',			[CricHydrauliqueControleur::class, 'entretienProblemeDescente']);
});

// dossier technique de l'électrovanne
$app->group('/electrovanne', function($group) {
	$group->get('',							[ElectrovanneControleur::class, 'aPropos']);
	$group->get('/mise-en-situation',		[ElectrovanneControleur::class, 'miseEnSituation']);
	$group->get('/fonctionnement',			[ElectrovanneControleur::class, 'fonctionnement']);
	$group->get('/analyse-fonctionnelle',	[ElectrovanneControleur::class, 'analyseFonctionnelle']);
	$group->get('/dessin-densemble',		[ElectrovanneControleur::class, 'dessinDensemble']);
	$group->get('/nomenclature',			[ElectrovanneControleur::class, 'nomenclature']);
});

// dossier technique de l'étau
$app->group('/etau', function($group) {
	$group->get('',						[EtauControleur::class, 'aPropos']);
	$group->get('/mise-en-situation',	[EtauControleur::class, 'miseEnSituation']);
	$group->get('/fonctionnement',		[EtauControleur::class, 'fonctionnement']);
	$group->get('/dessin-densemble',	[EtauControleur::class, 'dessinDensemble']);
	$group->get('/nomenclature',		[EtauControleur::class, 'nomenclature']);
	$group->get('/eclates',				[EtauControleur::class, 'eclate']);
	$group->get('/eclates/mors-fixe',	[EtauControleur::class, 'CEmorsFixe']);
	$group->get('/eclates/mors-mobile',	[EtauControleur::class, 'CEmorsMobile']);
	$group->get('/eclates/vis',			[EtauControleur::class, 'CEvis']);
	$group->get('/eclates/tige',		[EtauControleur::class, 'CEtige']);
});

// dossier technique de l'extracteur de roulement
$app->group('/extracteur-de-roulement', function($group) {
    $group->get('',                    [ExtracteurRoulementControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',  [ExtracteurRoulementControleur::class, 'miseEnSituation']);
    $group->get('/fonctionnement',     [ExtracteurRoulementControleur::class, 'fonctionnement']);
    $group->get('/dessin-densemble',   [ExtracteurRoulementControleur::class, 'dessinDensemble']);
    $group->get('/nomenclature',       [ExtracteurRoulementControleur::class, 'nomenclature']);
    $group->get('/eclate',             [ExtracteurRoulementControleur::class, 'eclate']);
});

// dossier technique du frein à disque
$app->group('/frein-a-disque', function($group) {
    $group->get('',                    [FreinDisqueControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',  [FreinDisqueControleur::class, 'miseEnSituation']);
    $group->get('/fonctionnement',     [FreinDisqueControleur::class, 'fonctionnement']);
    $group->get('/dessin-densemble',   [FreinDisqueControleur::class, 'dessinDensemble']);
    $group->get('/eclate',             [FreinDisqueControleur::class, 'eclate']);
    $group->get('/nomenclature',       [FreinDisqueControleur::class, 'nomenclature']);
});

// dossier technique du moteur de modélisme
$app->group('/moteur-de-modelisme', function($group) {
    $group->get('',									[MoteurModelismeControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',				[MoteurModelismeControleur::class, 'miseEnSituation']);
    $group->get('/fonctionnement',					[MoteurModelismeControleur::class, 'fonctionnement']);
    $group->get('/classe-equivalence',				[MoteurModelismeControleur::class, 'classeEquivalence']);
    $group->get('/classe-equivalence/bati',			[MoteurModelismeControleur::class, 'CEbati']);
    $group->get('/classe-equivalence/vilebrequin',	[MoteurModelismeControleur::class, 'CEvilebrequin']);
    $group->get('/classe-equivalence/bielle',		[MoteurModelismeControleur::class, 'CEbielle']);
    $group->get('/classe-equivalence/piston',		[MoteurModelismeControleur::class, 'CEpiston']);
    $group->get('/nomenclature',					[MoteurModelismeControleur::class, 'nomenclature']);
    $group->get('/eclate',							[MoteurModelismeControleur::class, 'eclate']);
});

// dossier technique de la pince de marquage
$app->group('/pince-de-marquage', function($group) {
    $group->get('',                                    [PinceMarquageControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',                  [PinceMarquageControleur::class, 'miseEnSituation']);
    $group->get('/fonctionnement',                     [PinceMarquageControleur::class, 'fonctionnement']);
    $group->get('/dessin-densemble',                   [PinceMarquageControleur::class, 'dessinDensemble']);
    $group->get('/nomenclature',                       [PinceMarquageControleur::class, 'nomenclature']);
    $group->get('/eclate',                             [PinceMarquageControleur::class, 'eclate']);
    $group->get('/sous-ensembles',                     [PinceMarquageControleur::class, 'sousEnsembles']);
    $group->get('/sous-ensembles/bati',                [PinceMarquageControleur::class, 'SEbati']);
    $group->get('/sous-ensembles/bras-superieur',      [PinceMarquageControleur::class, 'SEbrasSuperieur']);
    $group->get('/sous-ensembles/bras-inferieur',      [PinceMarquageControleur::class, 'SEbrasInferieur']);
    $group->get('/sous-ensembles/piston',              [PinceMarquageControleur::class, 'SEpiston']);
});

// dossier technique de la pince de robot
$app->group('/pince-de-robot', function($group) {
    $group->get('',                    [PinceRobotControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',  [PinceRobotControleur::class, 'miseEnSituation']);
    $group->get('/fonctionnement',     [PinceRobotControleur::class, 'fonctionnement']);
    $group->get('/nomenclature',       [PinceRobotControleur::class, 'nomenclature']);
    $group->get('/eclate',             [PinceRobotControleur::class, 'eclate']);
});

// dossier technique de la pompe à palettes
$app->group('/pompe-a-palettes', function($group) {
    $group->get('',                    [PompePalettesControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',  [PompePalettesControleur::class, 'miseEnSituation']);
    $group->get('/dessin-densemble',   [PompePalettesControleur::class, 'dessinDensemble']);
    $group->get('/nomenclature',       [PompePalettesControleur::class, 'nomenclature']);
    $group->get('/eclate',             [PompePalettesControleur::class, 'eclate']);
});

// dossier technique du préhenseur de culasse
$app->group('/prehenseur-de-culasse', function($group) {
    $group->get('',												[PrehenseurCulasseControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',							[PrehenseurCulasseControleur::class, 'miseEnSituation']);
    $group->get('/mise-en-situation/dispositif-de-transfert',	[PrehenseurCulasseControleur::class, 'MESdispositif']);
    $group->get('/mise-en-situation/etape1',					[PrehenseurCulasseControleur::class, 'MESetape1']);
    $group->get('/mise-en-situation/etape2',					[PrehenseurCulasseControleur::class, 'MESetape2']);
    $group->get('/mise-en-situation/etape3-4',					[PrehenseurCulasseControleur::class, 'MESetape34']);
    $group->get('/mise-en-situation/etape5',					[PrehenseurCulasseControleur::class, 'MESetape5']);
    $group->get('/mise-en-situation/etape6',					[PrehenseurCulasseControleur::class, 'MESetape6']);
    $group->get('/fonctionnement',								[PrehenseurCulasseControleur::class, 'fonctionnement']);
    $group->get('/fonctionnement/ouverture',					[PrehenseurCulasseControleur::class, 'fonctionnementOuverture']);
    $group->get('/fonctionnement/fermeture', 					[PrehenseurCulasseControleur::class, 'fonctionnementFermeture']);
    $group->get('/dessin-densemble',							[PrehenseurCulasseControleur::class, 'dessinDensemble']);
    $group->get('/nomenclature',								[PrehenseurCulasseControleur::class, 'nomenclature']);
    $group->get('/eclate',										[PrehenseurCulasseControleur::class, 'eclate']);
    $group->get('/eclate/bati',									[PrehenseurCulasseControleur::class, 'eclateBati']);
    $group->get('/eclate/tige-verin',							[PrehenseurCulasseControleur::class, 'eclateTigeVerin']);
    $group->get('/eclate/biellette',							[PrehenseurCulasseControleur::class, 'eclateBiellette']);
    $group->get('/eclate/bras-avec-2doigts',					[PrehenseurCulasseControleur::class, 'eclateBras2Doigts']);
    $group->get('/eclate/bras-avec-1doigt',						[PrehenseurCulasseControleur::class, 'eclateBras1Doigt']);
    $group->get('/mecanique',									[PrehenseurCulasseControleur::class, 'mecanique']);
    $group->get('/mecanique/deplacement-tige',					[PrehenseurCulasseControleur::class, 'mecaDeplacementTige']);
    $group->get('/mecanique/deplacement-pince',					[PrehenseurCulasseControleur::class, 'mecaDeplacementPince']);
    $group->get('/mecanique/effort-tige',						[PrehenseurCulasseControleur::class, 'mecaEffortTige']);
    $group->get('/mecanique/effort-articulation',				[PrehenseurCulasseControleur::class, 'mecaEffortArticulation']);
});

// dossier technique de l'unité de marquage
$app->group('/unite-de-marquage', function($group) {
    $group->get('',                                      [UniteMarquageControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',                    [UniteMarquageControleur::class, 'miseEnSituation']);
    $group->get('/elements',                             [UniteMarquageControleur::class, 'elements']);
    $group->get('/elements/corps',                       [UniteMarquageControleur::class, 'elementsCorps']);
    $group->get('/elements/verin',                       [UniteMarquageControleur::class, 'elementsVerin']);
    $group->get('/elements/enclume',                     [UniteMarquageControleur::class, 'elementsEnclume']);
    $group->get('/elements/embiellage',                  [UniteMarquageControleur::class, 'elementsEmbiellage']);
    $group->get('/elements/levier',                      [UniteMarquageControleur::class, 'elementsLevier']);
    $group->get('/fonctionnement',                       [UniteMarquageControleur::class, 'fonctionnement']);
    $group->get('/dessin-densemble',                     [UniteMarquageControleur::class, 'dessinDensemble']);
    $group->get('/eclate',                               [UniteMarquageControleur::class, 'eclate']);
    $group->get('/CE',                                   [UniteMarquageControleur::class, 'classeEquivalence']);
    $group->get('/flasque-droit',                        [UniteMarquageControleur::class, 'flasqueDroit']);
    $group->get('/flasque-droit/flasque',                [UniteMarquageControleur::class, 'flasqueDroitFlasque']);
    $group->get('/flasque-droit/dessin-definition',      [UniteMarquageControleur::class, 'flasqueDroitDessinDefinition']);
    $group->get('/mecanique',                            [UniteMarquageControleur::class, 'mecanique']);
    $group->get('/mecanique/efforts-embiellage-levier',  [UniteMarquageControleur::class, 'mecaEffortsEmbiellageLevier']);
    $group->get('/mecanique/effort-marquage',            [UniteMarquageControleur::class, 'mecaEffortMarquage']);
    $group->get('/mecanique/vitesse-bielette',           [UniteMarquageControleur::class, 'mecaVitesseBiellette']);
    $group->get('/mecanique/vitesse-levier',             [UniteMarquageControleur::class, 'mecaVitesseLevier']);
});

// dossier technique de la vanne sphérique
$app->group('/vanne-spherique', function($group) {
    $group->get('',                    [VanneSpheriqueControleur::class, 'aPropos']);
    $group->get('/mise-en-situation',  [VanneSpheriqueControleur::class, 'miseEnSituation']);
    $group->get('/fonctionnement',     [VanneSpheriqueControleur::class, 'fonctionnement']);
    $group->get('/dessin-densemble',   [VanneSpheriqueControleur::class, 'dessinDensemble']);
    $group->get('/eclate',             [VanneSpheriqueControleur::class, 'eclate']);
    $group->get('/nomenclature',       [VanneSpheriqueControleur::class, 'nomenclature']);
});
