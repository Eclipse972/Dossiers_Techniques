# Dossiers_Techniques

Ceci est le code de mon site de dossiers techniques en ligne que je réalise pour mes élèves.

Son adresse est: dossiers.techniques.free.fr

Chaque dossier relatif à un support est structurée suivant un arbre. La numérotation de Sosa-Stradonitz permet d'avoir un identifiant (donc unique) por chaque page. Le principal avantage c'est que toute l'arborescence est stockée dans un tableau à une dimension. Dans l'avenir on pourra stocker le tout dnas un seul table. Bien que je puisse créer des arbres de n'importe quelle taille je me limiterai à deux niveau pour chaque support. Du coup le menu de navigation n'aura que deux niveaux.

Chaque page est repéréré par 2 paramètres: l'dentifiant du support et cela de la page.

L'introduction de cette fonc modifie en profondeur les fichiers suivants:
index.php:
pageHTML.php: la zone navigation travaillais avec deux paramètre pour chque page maintenat il n'en faut plus qu'un
classe_support.php: l'implémentation du menu dans le support utilise un seul tableau et non plus 2 tableaux comme auparavant. un pour contenant les item et un autre contenant les sous items
