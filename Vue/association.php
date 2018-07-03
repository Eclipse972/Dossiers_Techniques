<?php
$association_image		= $T_instruction['param1'];
$association_fichier	= $T_instruction['param2'];
$association_extension	= $T_instruction['param3'];
$association_titre		= $T_instruction['param4'];

switch($association_extension) {
case '.EPRT':
	$association_commentaire = ''; // à définir
	break;
case '.EASM':
	$association_commentaire = 'Dans e-Drawing, cliquez sur l&apos;ic&ocirc;ne <img src="Vue/images/icone_eclater_rassembler.png" alt = "icone"> pour &eacute;clater/rassembler la maquette num&eacute;rique';
	break;
case '.EDRW':
	$association_commentaire = ''; // à définir
	break;
default:
	$association_commentaire = '';
}
$association = new Association_image_fichier($_SESSION[DOSSIER], $association_image, $association_fichier, $association_extension, $association_titre);
$association->Afficher($association_commentaire);
