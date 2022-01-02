
DROP VIEW IF EXISTS Vue_supports;
CREATE VIEW Vue_supports AS
SELECT
	ID,
	nom,
	pti_nom AS ptiNomSupport,
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
	CONCAT('Supports/',dossier,'/') AS dossier,
	CONCAT('Supports/',dossier,'/fichiers/',pti_nom,'.zip') AS zip,
	CONCAT('Supports/',dossier,'/images/',pti_nom,'.png') AS image
FROM Supports;
