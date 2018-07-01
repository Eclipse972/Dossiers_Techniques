<?php // association éclaté
$page = new Eclate($_SESSION[DOSSIER], $_SESSION[PTI_NOM], $_SESSION[PTI_NOM]);
$page->Afficher();
