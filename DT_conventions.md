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
/
├ A_traiter
├ BDD
├ config
├ old site
|	├ Modele
|	├ PEUNC
|	└ Vue
├ public
├ src
├ templates
├ vendor
├ .gitignore
├ Ajouter_un_dossier_technique.ctd 	# documentation expliquant comment ajouter un dossier technique
# Conventions de nommage
- Variables/fonctions : `snake_case`
- Classes : `PascalCase`
- Fichiers : `kebab-case`
- Constantes : `UPPER_SNAKE_CASE`
Remarque: tous les noms de variable, classe et fichiers sont en français non accentué
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
