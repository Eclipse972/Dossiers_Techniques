# une numérotation pour indiquer la filation des templates
Je sera amené à créer un certain nombre de templates. J'ai besoin un moyen de connaitre la filiation d'un template sans l'ouvrir. Mon idée est d'utiliser une numérotation.

# les règles
1. Chaque fichier templates commencent par un nombre pour indiquer sa filiation.
	Le nombre de chiffre indique la génération
	- 1 chiffre : génération 1 (racine)
	- 2 chiffres : génération 2 (fils)
	- 3 chiffres : génération 3 (petit-fils)

2. Le chiffre le plus à droite indique le rang dans la fraterie et les autres le numéro du parent
   - 8 : le 8e de la génération racine
   - 45 : le 5e fils de 4
   - 123 : 3 fils de 12 qui est le 2e fils de 1

3. zéro n'est pas utilisé car zéro ne peut être un numéro de rang.

# Limites
Ce système suppose qu'une même fratrie ne dépasse pas 9 membres.
Au-delà, la numérotation deviendrait ambiguë
Ex: 112 est il le douzième enfant de 1? ou le deuxième enfant de 11?

# Remarque
Le classement alphabétique dans l'explorateur de fichiers ne
reflète pas la hiérarchie (111 apparaît avant 12), mais cela n'a
aucun impact sur le fonctionnement de l'application.