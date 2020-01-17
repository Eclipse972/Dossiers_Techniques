CREATE VIEW Vue_nomenclature AS select Supports.ID AS support_ID,
concat('<td>',cast(Pieces.repere as char(2) charset utf8),'</td>') AS repere,
concat('<td><a href="Supports/',Supports.dossier,'/fichiers/',Pieces.fichier,convert(if((Pieces.assemblage = 0),'.EPRT','.EASM') using latin1),'"><img src="Supports/',Supports.dossier,'/images/',Pieces.fichier,'.png" alt="',Pieces.nom,'"></a>','</td>') AS lien_image,
concat('<td>',convert(Pieces.nom using utf8),if((Pieces.quantite > 1),concat(' (x',cast(Pieces.quantite as char(2) charset utf8),')'),''),'</td>') AS designation,

concat('<td>',if((Pieces.matiere_ID = 0),'',concat('<a href="https://fr.wikipedia.org/wiki/',Materiaux.URL_wiki,'" target="_blank">',Materiaux.formule,'</a>')),'</td>') AS matiere,

concat('<td>',Pieces.observation,'</td>') AS observation 
from ((Supports join Pieces) join Materiaux) where ((Pieces.matiere_ID = Materiaux.ID) and (Supports.ID = Pieces.support_ID)) 
order by Supports.ID,Pieces.repere;
