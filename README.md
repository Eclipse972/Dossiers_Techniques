# Dossiers_Techniques

Ceci est le code de mon site de dossiers techniques en ligne que je réalise pour mes élèves.

Son adresse est: dossiers.techniques.free.fr

Chaque dossier relatif à un support est structurée suivant un arbre. La numérotation de Sosa-Stradonitz permet d'avoir un identifiant (donc unique) por chaque page. Le principal avantage c'est que toute l'arborescence est stockée dans un tableau à une dimension. Dans l'avenir on pourra stocker le tout dans une seule table. Bien que je puisse créer des arbres de n'importe quelle taille je me limiterai à deux niveau pour chaque support. Du coup le menu de navigation n'aura que deux niveaux. Auparavant l'implémentation du menu utilisait deux tableaux un pour contenant les item et un autre contenant les sous items. Désormais le menu est impléneté dans un seul tableau. Items et sou-items sont stockés dans le même tableau.

Chaque page est repéréré par 2 paramètres: l'identifiant du support et cela de la page.

L'introduction de cette fonctionalité modifie en profondeur les fichiers suivants:
- index.php:
- pageHTML.php: la zone navigation travaillais avec deux paramètre pour chaque page maintenat il n'en faut plus qu'un.
- classe_support.php: implémentation de la structure des pages du support. Ce qui impacte le menu de navigation.
- fonctions.php:
- classe_menu.php

Remarque importante
Avant d'utiliser git j'ai commencé à implémenter 2 fonctionnalités en même temps (ce qui est une grosse erreur) la numérotation de Sosa-Stradonnitz et unemodification de la classe support. Dans la classe support toute les donnée étaient enregistrées dans l'instance de la classe. il y avait entre autre toutes les pièces de la nomenclature, le menu, les dessin... Désormais les données ne sont téléchargées que si elle sont nécessaires. Exemple toutes les pièces de la nomenclature sont téléchargées juste avant d'afficher la nomenclature uniquement.
