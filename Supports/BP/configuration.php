<?php // fichier de configuration du bouton poussoir
$this->Créer_dessin_densemble();
$this->Créer_éclaté();

//création du menu
$this->Ajouter_item_menu('pieuvre',				'Diagramme pieuvre');
$this->Ajouter_item_menu('dessin_densemble',	'Dessin d&#145;ensemble');
$this->Ajouter_item_menu('eclate',				'&Eacute;clat&eacute;');
$this->Ajouter_item_menu('nomenclature',		'Nomenclature');

// création de la nomenclature
$this->Ajouter_pièce(1,'Corps','Corps');
$this->Ajouter_pièce(2,'Borne','borne', 2);
$this->Ajouter_pièce(3,'Vis CS M2-4','Vis_CS',4);
$this->Ajouter_pièce(4,'Fourreau','Fourreau');
$this->Ajouter_pièce(5,'&Eacute;crou H M12-1','Ecrou_H');
$this->Ajouter_pièce(6,'&Eacute;crou molet&eacute;','Ecrou_molete');
$this->Ajouter_pièce(7,'Ressort','Ressort');
$this->Ajouter_pièce(8,'Rondelle de contact', 'Rondelle');
$this->Ajouter_pièce(9,'Cylindre de pouss&eacute;e','Cylindre');
$this->Ajouter_pièce(10,'Vis FS M2.5-18','Vis_FS');
$this->Ajouter_pièce(11,'Poussoir','Poussoir');
