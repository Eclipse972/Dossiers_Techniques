INSERT INTO Squelette (	alpha,			beta, gamma, 		texteMenu,	classePage)
SELECT					support_ID+2,	item, sous_item,	texte,		type_page
FROM Menu
-- +2 car dans la table Squelette il y la page d'accueil (alpha=0) et de contact (alpha=1)
