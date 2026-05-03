DROP VIEW IF EXISTS Vue_nomenclature;
CREATE VIEW Vue_nomenclature AS
SELECT
	Supports.ID AS support_ID,
	CONCAT('<td>',Pieces.repere,'</td>') AS repere,
	CONCAT(
		'<td><a href="/Supports/',Supports.dossier,'/fichiers/',Pieces.fichier,if((Pieces.assemblage = 0),'.EPRT','.EASM'),
		'" title="T&eacute;l&eacute;charger le fichier eDrawing"><img src="/Supports/',Supports.dossier,'/images/',Pieces.fichier,'.png" alt="',Pieces.nom,'"></a>','</td>') AS lien_image,
	CONCAT(
		'<td>',
		Pieces.nom,
		if((Pieces.quantite > 1),
			CONCAT(' (x',Pieces.quantite,')'),
			''),
		'</td>') AS designation,
	CONCAT(
		'<td>',
		if((Materiaux.URL_wiki = ''),
			Materiaux.formule,
			CONCAT('<a href="https://fr.wikipedia.org/wiki/',Materiaux.URL_wiki,'" target="_blank" title="Que dit Wikip&eacute;dia?">',Materiaux.formule,'</a>')),
		'</td>') AS matiere,
	CONCAT('<td>',Pieces.observation,'</td>') AS observation
FROM Supports
INNER JOIN Pieces ON Supports.ID = Pieces.support_ID
INNER JOIN Materiaux ON Pieces.matiere_ID = Materiaux.ID
ORDER BY Supports.ID, Pieces.repere
