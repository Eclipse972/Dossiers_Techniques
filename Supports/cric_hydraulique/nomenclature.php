<?php //nomenclature du cric roulant
include('Controleur/outils_nomenclature.php');

$T_nomenclature[] = new Ligne_nomenclature(1,1,'Flasque gauche','flasque_gauche','png','EASM');
$T_nomenclature[] = new Ligne_nomenclature(2,1,'Flasque droit','flasque_droit','png','EASM');
$T_nomenclature[] = new Ligne_nomenclature(3,2,'Roulette directrice assemblée','roulette_directrice','png','EASM');
$T_nomenclature[] = new Ligne_nomenclature(4,2,'Roue avant','roue_avant');
$T_nomenclature[] = new Ligne_nomenclature(5,2,'Axe roues avant','axe_roues_avant');
$T_nomenclature[] = new Ligne_nomenclature(6,1,'Axe pivot v&eacute;rin','axe_pivot_verin');
$T_nomenclature[] = new Ligne_nomenclature(7,1,'Axe pivot bras de levage','axe_pivot_bras_levage');
$T_nomenclature[] = new Ligne_nomenclature(8,6,'Rondelle M12','rondelleM12');
$T_nomenclature[] = new Ligne_nomenclature(9,6,'&Eacute;crou hexagonal ISO 4032-M12','ecrouM12');

// images à venir
$T_nomenclature[] = new Ligne_nomenclature(10,2,'Tourillon','');
$T_nomenclature[] = new Ligne_nomenclature(11,2,'Anneau élastique pour arbre 10x1','');
$T_nomenclature[] = new Ligne_nomenclature(12,1,'Unité hydraulique','');

Dessine_nomenclature($support->dossier,$T_nomenclature);
?>