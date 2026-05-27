Ici se trouvent mes règles pour le développement de mon site de dossiers techniques en ligne.

**Table des matières**
- [Langages](#langages)
- [Frameworks et bibliothèques](#frameworks-et-bibliothèques)
- [Gestion des dépendances](#gestion-des-dépendances)
- [Arborescence](#arborescence)
- [Architecture applicative](#architecture-applicative)
- [Format des données JSON](#format-des-données-json)
- [JavaScript](#javascript)
- [Style d'écriture des noms](#style-décriture-des-noms)
- [Conventions de nommage](#conventions-de-nommage)
- [Pratiques de code](#pratiques-de-code)
- [Gestion des exceptions](#gestion-des-exceptions)
- [Documentation](#documentation)
- [Qualité](#qualité)

# Langages
## Backend
- PHP 8
- SQL via PDO
## Frontend
- HTML 5
- CSS 3
- JS

# Frameworks et bibliothèques
- Backend : Slim framework 4
- Templates : Twig
- Frontend : aucun
- Base de données : MariaDB
- Interdit : React, Vue, Angular

# Gestion des dépendances
- Composer pour Slim, Twig et mes fichiers
- JS : aucun (vanilla JS)

# Arborescence
```
/
├── public/                         # Dossier racine accessible via le web
│   ├── index.php                   # Point d'entrée principal de l'application
│   ├── css/                        # Fichiers CSS
│   ├── js/                         # Fichiers JavaScript
│   │   ├── menu-builder.js         # Construction du menu
│   │   ├── page-builder.js         # Construction du contenu
│   │   └── types/                  # Scripts par type de page
│   │       ├── dessin.js
│   │       ├── nomenclature.js
│   │       └── eclate.js
│   ├── images/                     # Images
│   ├── supports/                   # Fichiers techniques par support
│   │   ├── support-a/
│   │   │   ├── images/             # Images du support
│   │   │   ├── pieces/             # Fichiers eDrawing
│   │   │   ├── assemblages/        # Fichiers eDrawing
│   │   │   └── dessins/            # Fichiers eDrawing
│   │   └── support-b/
│   └── .htaccess                   # Configuration Apache pour la réécriture d'URL
│
├── src/                            # Tous les scripts du projet (PHP, config, templates)
│   ├── Controleur/                 # Contrôleurs (gestion des requêtes HTTP)
│   |   ├── SupportControleur.php   # classe-mère de tous les supports
│   |   └── AutrePageControleur.php # controleur pour les pages qutre celle d'un dossier technique (accueil, contact, ...)
│   ├── Modele/                     # Modèles (logique métier et données)
│   ├── Exceptions/                 # Exceptions personnalisées
│   ├── Vue/                        # Templates Twig (.twig)
│   └── config/                     # Fichiers de configuration
│       ├── routes.php              # Définition des routes
│       ├── dependances.php         # Définitions des dépendances (conteneur PSR-11)
│       └── reglages.php            # Paramètres de l'application
├── documentation/                  # Documentation du projet (local uniquement)
├── old-site/                       # Ancien site conservé pour référence (local uniquement)
├── vendor/                         # Dépendances gérées par Composer
├── composer.json                   # Dépendances PHP et règles d'autochargement
├── composer.lock                   # Fige les versions précises des dépendances
├── maj-site.conf                   # fichier de configuration pour mon script maj-site
├── DT_conventions.md               # Conventions de programmation pour le projet et l'agent IA
└── README.md                       # Documentation du projet
```
# Architecture applicative

## Principe général
- PHP/Slim gère le routage et la logique métier
- Twig génère le HTML avec les données JSON embarquées
- JavaScript construit l'intégralité du contenu visible
- Fichiers techniques stockés dans /public/supports/{nom_support}/

## Flux de données
1. Requête utilisateur → Slim Router
2. Contrôleur récupère les données (BDD)
3. Contrôleur passe les données au template Twig
4. Twig injecte le JSON dans le DOM (balise `<div id="app-data" data-json='...'>`)
5. JS lit le JSON et génère l'affichage complet

## Responsabilités

### PHP/Slim (Backend)
- Routage des URLs
- Récupération des données en BDD
- Construction du JSON
- Transmission des données à Twig

### Twig (Templates)
- Structure HTML minimale (doctype, head, body)
- Injection des données JSON dans le DOM
- Chargement des scripts JS nécessaires
- Données fournies : métadonnées de la page, données métier, configuration

### JavaScript (Frontend)
- Lecture du JSON embarqué
- Génération du menu de navigation
- Construction du contenu principal
- Gestion des interactions utilisateur

## Scripts JS par page
- `menu-builder.js` : génère le menu de navigation via buildMenu(data)
- `page-builder.js` : construit le contenu principal via buildPage(data, type)
- Scripts spécifiques par type de page dans `/js/types/` (dessin, nomenclature, éclaté)

# Format des données JSON

## Structure générale
Données injectées par Twig dans une balise avec attribut data-json.

## Nomenclature des clés
- snake_case (cohérent avec PHP/BDD)
- Clés explicites en français non accentué

## Exemple de structure
```json
{
  "support": "nom_du_support",
  "type_page": "dessin_ensemble",
  "titre": "Dessin d'ensemble",
  "fichiers": [
    {
      "nom": "plan_001.pdf",
      "chemin": "/supports/support-a/dessins/plan_001.pdf",
      "taille": "2.3 Mo"
    }
  ],
  "navigation": {
    "precedent": "/support-a/page-2",
    "suivant": "/support-a/page-4"
  }
}
```

# JavaScript

## Principes
- Vanilla JS uniquement (ES6+)
- Modules ES6 si nécessaire (import/export)
- Code organisé par responsabilité

## Stratégie de rendu côté client
Deux mécanismes complémentaires sont utilisés pour construire l'affichage :

1. **Texte à trous (DOM Binding déclaratif)** : le template Twig produit une structure
   HTML avec des balises `<span>`, `<p>`, etc. portant des identifiants explicites.
   JS lit le JSON embarqué et injecte les valeurs dans ces emplacements réservés.
   Exemple : `<span id="titre-support"></span>` → rempli par JS via `textContent`.

2. **Clonage de templates natifs (HTMLTemplateElement)** : pour les structures répétées
   ou complexes (listes, cartes, lignes de tableau), on privilégie la balise `<template>`
   côté HTML. JS clone son contenu via `template.content.cloneNode(true)`, le remplit,
   puis l'insère dans le DOM. Cela évite de construire du HTML complexe en JS.

Ces deux approches constituent une **hydratation légère** : le HTML est pré-structuré
par Twig, JS se charge uniquement de l'enrichir avec les données.

## Règles d'usage
- Préférer `<template>` dès qu'un bloc HTML est répété (nomenclature, liste de fichiers…)
- Utiliser les identifiants `id` pour les emplacements uniques, les classes pour les
  emplacements répétés à l'intérieur d'un clone de `<template>`
- Ne jamais construire de HTML complexe par concaténation de chaînes en JS
- Injection de texte via `textContent` (jamais `innerHTML` avec des données utilisateur)

## Gestion des données
- Lecture du JSON depuis le DOM au chargement
- Validation basique des données reçues (vérifier présence des clés attendues)
- Gestion des erreurs si données manquantes/incorrectes

## Manipulation du DOM
- Création d'éléments via `createElement()` uniquement pour les cas simples (1-2 noeuds)
- Ajout dans des emplacement identifiés sur la page. Exemple <span id="nom"></span>
- Clonage via `template.content.cloneNode(true)` pour les structures répétées
- Événements via `addEventListener()`

## Manipulation du DOM
- Création d'éléments via createElement() (pas de innerHTML avec données utilisateur)
- Classes CSS via classList
- Événements via addEventListener()

## Performance
- Pas de manipulation DOM dans des boucles si évitable
- Event delegation pour les listes d'éléments
- Lazy loading des images si nécessaire

# Style d'écriture des noms
- Variables/fonctions : `snake_case`
- Tables et vues de base de données : `snake_case`
- Classes : `PascalCase`
- Fichiers : `kebab-case`
- Constantes : `UPPER_SNAKE_CASE`

# Conventions de nommage
Conserver l'anglais pour les mots-clés des langages (ex: function, class, fetchAll()), les méthodes des frameworks (ex: addRoute() de Slim), et les APIs/standards (ex: JSON, DOM).

Noms personnalisés : utiliser le français non accentué pour :
- Les variables, fonctions, classes, fichiers et tables de BDD que tu crées
- Les clés JSON et les données métier

Exemples en PHP :
- `$identifiant_utilisateur = $requete->fetchAll();` // fetchAll() reste en anglais
- `class GestionDossier { ... }` // classe personnalisée en français

# Pratiques de code
- Une fonction ou méthode ne doit pas dépasser 30 lignes
- 1 classe = 1 responsabilité
- Une fonction/méthode ne fait qu'une seule chose
- En PHP : utiliser les namespaces et l'autoloading
- Le nom d'une variable ou constante doit être explicite

# Gestion des exceptions

## Emplacement
- Dossier : `src/Exceptions/`
- Namespace : `App\Exceptions`

## Organisation
- `Http/` : exceptions HTTP (404, 401, etc.)
- `Business/` : exceptions métier spécifiques
- `Technical/` : exceptions techniques (DB, filesystem, etc.)

## Conventions de nommage
- Suffixe obligatoire : `Exception`
- Exemple : `SupportNotFoundException`, `InvalidFileException`

## Utilisation
Toutes les exceptions personnalisées doivent étendre `App\Exceptions\BaseException`

# Documentation
- Chaque fichier contient sa propre documentation
- PHP : PHPDoc pour chaque classe et méthode
- JS : JSDoc pour chaque fonction ou méthode
- HTML et CSS : commentaires dans le code

# Qualité

## Tests
Outils à définir

## Sécurité
À définir

## Performance
- Backend : utiliser Redis comme serveur de cache (disponible chez o2switch)
- Frontend : pas de minification pour conserver un code lisible