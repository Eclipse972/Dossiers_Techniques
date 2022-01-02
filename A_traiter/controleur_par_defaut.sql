-- définir le nom de controleur par défaut
UPDATE Squelette
SET controleur = CONCAT(
		(SELECT dossier FROM Supports WHERE Supports.ID = Squelette.alpha-2), -- -2 à cause de la page d'accueil (alpha=0) et la page de contact (alpha=1)
		'/',Squelette.ptiNom,'.php'
	)
WHERE Squelette.ID > 1;
