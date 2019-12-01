DROP VIEW Vue_nomenclature;
CREATE VIEW Vue_nomenclature AS SELECT Supports.ID, 
# repère
CONCAT("\t<td>", CONVERT(repere, CHAR(2)), "</td>\n") AS rep,

# lien image
CONCAT("\t",'<td><a href="Supports/',dossier,'/fichiers/',fichier,IF(assemblage=0,'.EPRT','.EASM'),'"><img src="Supports/',dossier,'/images/',fichier,'.png" alt="',Pieces.nom,'"></a>', "</td>\n") AS lien_image,

# désignation
CONCAT("\t<td>",Pieces.nom, IF(quantite>1,CONCAT(' (x',CONVERT (quantite, CHAR(2)),')'),''), "</td>\n") AS designation,

# colonnes facultatives
# matière
IF(type_nomenclature<2,'',CONCAT("\t<td>",IF(URL_wiki='',formule,CONCAT('<a href="https://fr.wikipedia.org/wiki/',URL_wiki,'" target="_blank">',formule,'</a>')), "</td>\n")) AS matiere,

# observation
IF((type_nomenclature=0) OR (type_nomenclature=2),'',CONCAT("\t<td>",observation,"</td>\n")) AS observation
FROM Supports, Pieces, Materiaux
WHERE Pieces.matiere_ID=Materiaux.ID AND Supports.ID=Pieces.support_ID
ORDER BY Supports.ID ASC, repere ASC
