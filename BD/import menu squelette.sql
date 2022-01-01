INSERT INTO Squelette (	alpha,			beta, gamma, 		texteMenu,	classePage)
SELECT					support_ID+2,	item, sous_item,	texte,		type_page
FROM Menu
