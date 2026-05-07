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
- Backend : Slim framework
- Frontend : aucun
- Base de données : mariaDB
- Interdit : React, Vue, Angular

# Outils de développement
VS Code (recommandé)

# Gestion des dépendances
- composer pour Slim et mes fichiers
- JS : Aucun (vanilla JS)

# Mes pratiques de code
- DRY (Don't Repeat Yourself)
- Fonctions < 20 lignes
- 1 classe = 1 responsabilité (SOLID)

# Gestion des erreurs
Exceptions personnalisées en PHP et JS

# Tests
Outils à définir

# Documentation
- pas de fichier séparé
- chaque fichiers contient sa propre documentation
- PHP en PHPdoc
- JS en JSdoc
- Html et CSS sous forme de commentaire dans le code

# Sécurité

# Performance
- Backend : Utiliser un serveur de cache comme redis qui est disponible chez o2switch
- Frontend : pas de minification pour avoir un code lisible
