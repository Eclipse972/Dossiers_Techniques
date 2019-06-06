<?php
// détermination du type de page
$BD = new base2donnees();
$Tmots_clé = array(
//	mot-clé	issu de la BD	=> type de page à créer
	'association'			=> 'Page_association',
	'classe_equivalence'	=> 'Page_CE',
	'dessin_definition'		=> 'Page_dessin_def',
	'dessin-densemble'		=> 'Page_dessin_densemble',
	'eclate'				=> 'Page_éclaté',
	'image_dessous'			=> 'Page_image_dessous',
	'image_dessus'			=> 'Page_image_dessus',
	'nomenclature'			=> 'Page_nomenclature'
);
$script = $BD->Script($oSupport->Id(), $oSupport->Item(), $oSupport->Sous_item());

if (file_exists($oSupport->Dossier().$script)) // si le script dans le dossier du support existe
	$script = $oSupport->Dossier().$script;
elseif (file_exists('Vue/mots-cles/'.$script)) // sinon c'est un mot clé
	$script ='Vue/mots-cles/'.$script;
else
	$script = 'Vue/oups.php'; // si le script n'existe nulle part ...

//chargement de paramètres dans un tableau pour le script
$BD = new base2donnees();
$T_instruction = $BD->Parametres_script($oSupport->Id(), $oSupport->Item(), $oSupport->Sous_item());

include $script;
