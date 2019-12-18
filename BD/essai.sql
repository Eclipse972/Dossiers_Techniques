DROP VIEW Vue_hydrate_supports;
CREATE VIEW Vue_hydrate_supports AS 
SELECT ID, nom, pti_nom, type_nomenclature, 
	CONCAT(IF(article_ID=1,'du ', IF(article_ID=2,'de la ', 'de l&apos;')),nom) AS du_support,
	CONCAT(IF(article_ID=1,'le ', IF(article_ID=2,'la ', 'l&apos;')),nom) AS le_support,
	CONCAT('Supports/', dossier, '/') AS dossier,
	CONCAT('Supports/', dossier, '/fichiers/', pti_nom, '.zip') AS zip,
	CONCAT('Supports/', dossier, '/images/', pti_nom, '.png') AS image
FROM Supports
