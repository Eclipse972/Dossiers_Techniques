-- recherche ptiNom vide
SELECT * FROM `Squelette` WHERE `ptiNom` ="" ORDER BY alpha ASC

UPDATE Squelette
SET ptiNom="MEP"
WHERE texteMenu = "Mise en situation"

UPDATE Squelette
SET ptiNom="pieuvre"
WHERE texteMenu = "Diagramme pieuvre"

UPDATE Squelette
SET ptiNom="dessin_densemble"
WHERE texteMenu = "Dessin d&apos;ensemble"

UPDATE Squelette
SET ptiNom="eclate"
WHERE texteMenu = "&Eacute;clat&eacute;"

UPDATE Squelette
SET ptiNom="nomenclature"
WHERE texteMenu = "Nomenclature"

UPDATE Squelette
SET ptiNom="fonctionnement"
WHERE texteMenu = "Fonctionnement"

UPDATE Squelette
SET ptiNom="AF"
WHERE texteMenu = "Analyse fonctionnelle"

UPDATE Squelette
SET ptiNom="dessin2définition"
WHERE texteMenu = "Dessins de d&eacute;finition"

UPDATE Squelette
SET ptiNom="diagrammeA-0"
WHERE texteMenu = "Diagramme A-0"
