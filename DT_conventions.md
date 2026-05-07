Ici se trouvent mes règles pour le développement de mon site de dossiers techniques en ligne.
# langages
## backend
- PHP 8
- SQL via PDO
## frontend
- html 5
- CSS 3
- JS

# Arborescence
C'est une arborescence classique de slim frameworklégèrement modifiée
/
├── public/                          # Dossier racine accessible via le web
│   ├── index.php                    # Point d'entrée principal de l'application
│   ├── css/                         # Fichiers CSS
│   ├── js/                          # Fichiers JavaScript
│   ├── images/                      # Images
│   └── .htaccess                    # Configuration Apache pour la réécriture d'URL
├── src/                             # Code source de l'application
│   ├── Controllers/                 # Contrôleurs (gestion des requêtes HTTP)
│   ├── Middleware/                  # Middlewares (traitements intermédiaires)
│   ├── Models/                      # Modèles (logique métier et données)
│   ├── Services/                    # Services réutilisables (ex: base de données, email)
│   └── Utilities/                   # Fonctions ou classes utilitaires
├── templates/                       # Modèles de vues (ex: Twig, PHP)
├── config/                          # Fichiers de configuration
│   ├── routes.php                   # Définition des routes
│   ├── dependencies.php             # Définitions des dépendances (conteneur PSR-11)
│   └── settings.php                 # Paramètres de l'application
├── vendor/                          # Dépendances gérées par Composer
├── composer.json                    # Dépendances PHP et règles d'autochargement
├── composer.lock                    # fige les versions précises des dépendances installées par Composer
├── DT_conventions.md                # mes conventions de programation qui servira aussi à un agent IA
└── README.md                        # Documentation du projet

# style d'écriture des noms
- Variables/fonctions : `snake_case`
- nom des tables et vues de base de données : `snake_case`
- Classes : `PascalCase`
- Fichiers : `kebab-case`
- Constantes : `UPPER_SNAKE_CASE`

# Conventions de nommage
Bien que PHP et Slim utilisent l'anglais. Tous les noms de variable, classe et fichiers seront en français non accentué
Exemples:
- start est interdit car en anglais
- départ est interdit car il y un accent
- depart est correct

# Frameworks et bibliothèques
- Backend : Slim framework 4
- Frontend : aucun
- Base de données : mariaDB
- Interdit : React, Vue, Angular

# Gestion des dépendances
- composer pour Slim et mes fichiers
- JS : Aucun (vanilla JS)

# Architecture applicative

## Principe général
- PHP génère le template HTML minimal + données JSON embarquées
- JavaScript construit l'intégralité du contenu visible
- Fichiers techniques stockés dans /public/supports/{nom_support}/

## Flux de données
1. Requête utilisateur → Slim Router
2. Contrôleur récupère les données (BDD)
3. Template PHP injecte JSON dans le DOM (balise <div id="data">)
4. JS lit le JSON et génère l'affichage complet

## Responsabilités

### PHP (Backend)
- Routage des URLs
- Récupération des données en BDD
- Construction du JSON
- Rendu du template minimal (structure HTML + <script>)

### JavaScript (Frontend)
- Lecture du JSON embarqué
- Génération du menu de navigation
- Construction du contenu principal
- Gestion des interactions utilisateur

## Scripts JS par page
- `menu-builder.js` : génère le menu de navigation
- `page-builder.js` : construit le contenu principal
- Scripts spécifiques par type de page (dessin, nomenclature, éclaté)

# Mes pratiques de code
- Fonctions ou une méthode ne doit pas dépasser 30 lignes
- 1 classe = 1 responsabilité
- le nom d'une variable ou de constante doit être explicite

# Gestion des erreurs
Exceptions personnalisées en PHP et JS

# Tests
Outils à définir

# Documentation
- chaque fichier contient sa propre documentation
- script PHP avec PHPdoc pour chaque méthode et la classe
- script JS en JSdoc pour chaque fonction ou méthode
- Html et CSS sous forme de commentaire dans le code

# Sécurité

# Performance
- Backend : Utiliser un serveur de cache comme redis qui est disponible chez o2switch
- Frontend : pas de minification pour avoir un code lisible
