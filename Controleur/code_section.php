<?php
// détermination du script
$BD = new base2donnees();
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
