-- remplacement des classes Page_Image_dess(o)us par Page_Image dans la table Squelette
UPDATE Squelette
SET classePage = "Page_image"
WHERE classePage like "Page_image%"
