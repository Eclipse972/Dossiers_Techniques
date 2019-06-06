<?php
// détermination du type de page
$Tmots_clé = array(
//	mot-clé	issu de la BD	=> type de page à créer
	'association'			=> 'Page_association',
	'classe_equivalence'	=> 'Page_CE',
	'dessin_definition'		=> 'Page_dessin2définition',
	'dessin_densemble'		=> 'Page_dessin_densemble',
	'eclate'				=> 'Page_éclaté',
	'image_dessous'			=> 'Page_image_dessous',
	'image_dessus'			=> 'Page_image_dessus',
	'nomenclature'			=> 'Page_nomenclature'
);

//chargement de paramètres dans un tableau pour le script
$BD = new base2donnees();
$T_instruction = $BD->Parametres_script($oSupport->Id(), $oSupport->Item(), $oSupport->Sous_item());

$BD = new base2donnees();
$script = $BD->Script($oSupport->Id(), $oSupport->Item(), $oSupport->Sous_item()); // sans l'extension .php

// création du tableau contenant les paramètres qui viendra par la suite de la BD
$Tparam = null;
switch($script) {
	case 'association':
		$Tparam['image'] = $T_instruction['param1'];
		$fichier_avec_extension = $T_instruction['param2'];
		$Tparam['fichier'] = substr($fichier_avec_extension, 0, strlen($fichier_avec_extension)-5);
		$Tparam['extension'] = substr($fichier_avec_extension, -5); // ne fonctionne pas avec une extension de logueur différente
		$Tparam['titre'] = $T_instruction['param3'];
		$Tparam['commentaire'] = $T_instruction['param4'];
		break;
	case 'classe_equivalence':
		$Tparam['nom_CE'] = $T_instruction['param3'];
		$fichier = $T_instruction['param2']; // il contient l'extension .EASM ou .EPRT
		$Tparam['fichier'] = substr($fichier, 0, strlen($fichier)-5);
		$Tparam['extension'] = substr($fichier, -5);
		break;
	case 'dessin_definition';
		$Tparam['image'] = $T_instruction['param1'];
		$Tparam['fichier'] = $T_instruction['param2'];
		$Tparam['titre'] = ''; // non défini dans la version actuelle
		break;
	case 'dessin_densemble':
	case 'eclate':
		$Tparam['image'] = $T_instruction['param1'];
		$Tparam['fichier'] = $T_instruction['param2'];
		break;
	case 'image_dessous':
	case 'image_dessus':
		$Tparam['titre'] = $T_instruction['param1'];
		$Tparam['image'] = $T_instruction['param2'];
		$Tparam['commentaire'] = $T_instruction['param3'];
		$Tparam['hauteur'] = $T_instruction['param4'];
		break;
	case 'nomenclature':
		$Tparam = null;
		break;
	default:
		$Tparam = $script;
}	// fin du switch

if (isset($Tmots_clé[$script])) { // le script sans son extension est-il un mot-clé?
	$type_page = $Tmots_clé[$script];
	// le nom de la page est dans le tableau et $Tparam défini dans le fichier inclus
} else { // ce n'est pas un mot clé => fichier à télécharger
	$type_page = 'Page_script';
}
$page = new $type_page($Tparam);
$page->Afficher();
