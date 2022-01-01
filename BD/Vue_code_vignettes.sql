DROP VIEW IF EXISTS Vue_code_vignettes;
CREATE VIEW Vue_code_vignettes AS
SELECT CONCAT(
	'<td><a href="/',dossier,'/MEP">'
	,nom
	,'<br><img src="Supports/',dossier,'/images/',pti_nom,'.png" alt="',nom,'"></a></td>'
) AS `code`

FROM Supports
ORDER BY pti_nom, nom;
