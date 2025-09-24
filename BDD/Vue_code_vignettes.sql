DROP VIEW IF EXISTS Vue_code_vignettes;
CREATE VIEW Vue_code_vignettes AS
SELECT CONCAT(
	'<td><a href=/',dossier,'/MES title="dossier technique ',
	CASE article_ID
		WHEN 1 THEN 'du '
		WHEN 2 THEN 'de la '
		ELSE 'de l&apos;'
	END,
	nom,'">'-- fin du lien
	,nom
	,'<br><img src=Supports/',dossier,'/images/',pti_nom,'.png alt="',nom,'"></a></td>'
) AS `code`

FROM Supports
ORDER BY pti_nom, nom;
