INSERT INTO Squelette (	alpha,	beta,	gamma, 	texteMenu,			ptiNom,		classePage)
SELECT					ID+2,	0,		0,		"&Agrave propos",	dossier,	"PageApropos"
FROM Supports
-- +2 car dans la table Squelette il y la page d'accueil (alpha=0) et de contact (alpha=1)
