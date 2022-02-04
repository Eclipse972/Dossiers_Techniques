# génère la totalité des URL valides du site avec la méthode de la requête et la liste des paramètres autorisés au format JSON
DROP VIEW IF EXISTS Vue_URLvalides;
CREATE VIEW Vue_URLvalides AS
SELECT
	ID,
	alpha AS niveau1,
	beta AS niveau2,
	gamma AS niveau3,
	(SELECT CONCAT('/',ptiNom) FROM Squelette WHERE alpha = (SELECT niveau1) AND beta = (SELECT niveau2) AND gamma = 0 AND beta>0) AS texte2,
	(SELECT CONCAT('/',ptiNom) FROM Squelette WHERE alpha = (SELECT niveau1) AND beta = (SELECT niveau2) AND gamma = (SELECT niveau3) AND beta>0 AND gamma>0) AS texte3,
	CONCAT('/',(SELECT ptiNom FROM Squelette WHERE alpha = (SELECT niveau1) AND beta = 0 AND gamma = 0)
		,IF(ISNULL((SELECT texte2)),'',(SELECT texte2))
		,IF(ISNULL((SELECT texte3)),'',(SELECT texte3))
	) AS URL,
	methode,
	paramAautorise
FROM Squelette
ORDER BY niveau1 ASC, niveau2 ASC, niveau3 ASC
