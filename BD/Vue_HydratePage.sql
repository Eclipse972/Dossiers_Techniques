-- vue donne toutes les informations nécessaires à l'hydration de chaque objet page
DROP VIEW IF EXISTS Vue_HydratePage;
CREATE VIEW Vue_HydratePage AS
SELECT
	alpha,
	beta,
	gamma,
	Supports.nom,
	Squelette.texteMenu,
	Supports.pti_nom AS ptiNomSupport,
	CONCAT(	CASE article_ID
				WHEN 1 THEN 'du '
				WHEN 2 THEN 'de la '
				ELSE 'de l&apos;'
			END, nom
		) AS du_support,
	CONCAT(	CASE article_ID
				WHEN 1 THEN 'le '
				WHEN 2 THEN 'la '
				ELSE 'l&apos;'
			END, nom
		) AS le_support,
	CONCAT(dossier,'/') AS dossier,
	CONCAT('Supports/',dossier,'/fichiers/',pti_nom,'.zip') AS zip,
	CONCAT('Supports/',dossier,'/images/',pti_nom,'.png') AS image
FROM Supports
INNER JOIN Squelette ON Supports.ID = Squelette.alpha-2
WHERE  Squelette.alpha > 1 -- alpha = 0 -> page d'accueil et alpha = 1 page de contact
