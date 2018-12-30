<?php
function Contexte($chemin_script_connexion) { // donne la position actuelle en clair sur le site. 
	$BD = new base2donnees($chemin_script_connexion);
	if (isset($_SESSION['support'])) {
		$oSupport = unserialize($_SESSION['support']);
		if ($oSupport->ID() > 0)
			$objet = 'la page &laquo;'.$BD->Texte_item($oSupport->ID(), $oSupport->Item(), $oSupport->Sous_item()).'&raquo; '.$oSupport->Du_support();
		else
			$objet = 'l&apos;archive ZIP';
	} else	$objet = 'la liste de supports';
return $objet;
}
