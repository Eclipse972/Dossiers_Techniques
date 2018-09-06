<?php // Controleur dossier technique
function Configurer() {
$BD = new base2donnees();
list($id, $item, $sous_item) = Lire_parametre("p", -1, 1);
// les scénari possibles
if ($BD->Support_existe($id)) { // le support demandé existe
	if (isset($_SESSION['support'])) { // si il y a un support en cours
		$oSupport = unserialize($_SESSION['support']);
		if ($oSupport->ID() != $id) // changement de support?
			$oSupport = new Support($id); // alors on en crée un nouveau
	} else $oSupport = new Support($id); // alors on le crée
	$oSupport->setPosition($item, $sous_item); // on met à jour a position
	$_SESSION['support'] = serialize($oSupport);
	return ['css'	=> ($item > 0) ? 'styleDT' : 'style_page',
			'logo'	=> ($item > 0) ? Lien($oSupport->Image(),$oSupport->ID(),0) : $oSupport->Image(),
			'titre'	=> (($item > 0) ? 'Dossier technique ' : '&Agrave; propos ').$oSupport->Du_support(),
			'page'	=> ($item > 0) ? 'pageHTML' : 'a_propos',
			'cache'	=> $oSupport->Pti_nom().' '.Creer_parametre($oSupport->ID(), $oSupport->Item(), $oSupport->Sous_item())];
} else { // le support demandé n'existe pas => page d'index
	$_SESSION['support'] = null; // Destruction du support en cours
	return ['css'	=> 'style_page',
			'logo'	=> '<img src="Vue/images/logo.png" alt="logo">',
			'titre' => 'Liste des dossiers techniques',
			'page'	=> 'listeDsupports',
			'cache'	=> 'index'];
}
}
