<?php // association dessin d'ensemble
$page = new Dessin_densemble($_SESSION[DOSSIER], $_SESSION[PTI_NOM], $_SESSION[PTI_NOM]);
$page->Afficher();
