# Dossiers_Techniques

Ceci est le code de mon site de dossiers techniques en ligne que je réalise pour mes élèves.

Son adresse est: dossiers.techniques.free.fr

Gestion des associations image-fichier
Définition: cette association affiche un image cliquable qui permet de télécharger le fichier correspondant.

Liste des associations
- dessin d'ensemble 
- dessin définition 
- éclaté
- classe d'équivalence

Utiliser un script qui charge des infos juste avant de les afficher. 

ID: faire un script ultracourt qui ne contient que le nom du fichier et celui de l'image stocker dans trois variables:
- Image: nom du fichier sans l'extension car c'est toujours le format PNG
- Fichier: nom de fichier sans l'extension car suivant le type de document on connaît l'extension
- extension. Dans certains cas il est utile de la définir par exemple une classe d'équivalence et un assemblage de pièces mais peut être réduit à une seule pièce. Dans le premier cas à l'extension est EASM dans second c'est EPRT.

Si le script est absent on utilise les variables par défaut. En utilisant de la variable-membre pti_nom

Proposition de solution : initialiser 3 variables vides

