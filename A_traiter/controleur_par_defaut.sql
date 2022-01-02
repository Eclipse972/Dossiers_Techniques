-- définir le nom de controleur par défaut
UPDATE Squelette
SET controleur = CONCAT(
		(SELECT dossier FROM Supports WHERE Supports.ID = Squelette.alpha-2),
		'/',Squelette.ptiNom,'.php'
	)
WHERE Squelette.ID > 1;
