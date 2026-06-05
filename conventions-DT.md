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
- PHP 8
- HTML 5
- CSS 3
- JS

# Frameworks et bibliothèques
- Backend : Slim framework 4
- Templates : Twig
- Interdit : framework frontend

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
│	├── Vue/                        # Templates Twig
│	│	├── supports/				# templates spécifique à chaque support
│	│	├── base.html.twig
│	│	├── home.html.twig
│	│	├── pageDT.html.twig
│	│	└── pageDT-include.html.twig
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
- JavaScript gère les comportements et construit le contenu de certaines pages via le pattern data-json.
- Fichiers techniques stockés dans /public/supports/{nom_support}/

## Flux de données
1. Requête utilisateur → Slim Router
2. Contrôleur lit les données (tableaux associatifs PHP)
3. Contrôleur passe les données au template Twig
4. Twig injecte le JSON dans le DOM (balise `<div id="app-data" data-json='...'>`)
5. JS lit le JSON et génère l'affichage complet

## Responsabilités

### PHP/Slim (côté serveur)
- Routage des URLs
- Lecture des données depuis des tableaux associatifs
- Construction du JSON
- Transmission des données à Twig

### Twig (côté serveur)
- Structure HTML (doctype, head, body)
- Injection des données JSON dans le DOM via `data-json` pour les pages DT
- Chargement des scripts JS nécessaires
- Rendu direct du contenu pour les pages simples, à condition que le template reste
  lisible : conditions à plat, boucles sans imbrication. Dès qu'une condition apparaît
  dans une boucle, ou qu'une logique se répète, basculer vers le pattern data-json + JS.

### JavaScript (côté client)
- Comportements et interactions : menu de navigation, animations, événements utilisateur
- Pour les pages DT : lecture du JSON embarqué, génération du contenu principal
- Validation basique des données reçues

### Choisir entre Twig et JS
**La page a-t-elle besoin d'interaction ou d'animation ?**
- Oui → JS (menu, transitions, événements)
- Non → continuer

**Les données sont-elles entièrement connues côté serveur ?**
- Non → pattern data-json + JS
- Oui → continuer

**Le template reste-t-il lisible : pas de condition dans une boucle, pas de logique répétée ?**
- Non → pattern data-json + JS
- Oui → Twig suffit

# Format des données JSON

## Structure générale
Données injectées par Twig dans une balise avec attribut data-json.

## Nomenclature des clés
- snake_case (cohérent avec PHP)
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
- Pas de minification pour conserver un code lisible

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
- Variables : `snake_case`
- Fonctions : `camelCase`
- Classes : `PascalCase`
- Fichiers : `kebab-case`
- Constantes : `UPPER_SNAKE_CASE`

# Conventions de nommage
Conserver l'anglais pour les mots-clés des langages (ex: function, class, fetchAll()), les méthodes des frameworks (ex: addRoute() de Slim), et les APIs/standards (ex: JSON, DOM).

Noms personnalisés : utiliser le français non accentué pour :
- Les variables, fonctions, classes et fichiers
- Les clés JSON et les données métier

Exemples en PHP :
- `$identifiant_utilisateur = $requete->fetchAll();` // fetchAll() reste en anglais
- `class GestionDossier { ... }` // classe personnalisée en français

URL et nom de fichiers : pas de majuscule ni sigle mais des noms en toutes lettres en minuscules et kébab-case
- MES -> mise-en-situation
- BP -> bouton-poussoir
- brideAnez -> bride-a-nez
Les noms doivent être lisibles.

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
- Backend : LiteSpeed Cache (LSCache) activé depuis cPanel, sans modification du code.
- Contrôle fin du cache par en-tête HTTP depuis les contrôleurs Slim :
  - `header('X-LiteSpeed-Cache-Control: public, max-age=3600')` — page statique (dossier technique)
  - `header('X-LiteSpeed-Cache-Control: no-cache')` — page dynamique ou privée
  - `header('X-LiteSpeed-Purge: url=/chemin/page')` — invalider une page du cache