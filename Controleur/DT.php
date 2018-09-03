<?php // Controleur dossier technique
function Configurer() {
$BD = new base2donnees();
list($id, $item, $sous_item) = Lire_parametre("p", -1, 1);
// les scénari possibles
if ($BD->Support_existe($id)) { // le support demandé existe
	if (!isset($_SESSION['support'])) {// si le support en cours n'existe pas
		$_SESSION['support'] = new Support($id); // alors on le crée
	}
	$_SESSION['support']->setPosition($item, $sous_item); // on met à jour a position
	return ['css'	=> ($item > 0) ? 'styleDT' : 'style_page',
			'logo'	=> ($item > 0) ? Lien($_SESSION['support']->Image(),$_SESSION['support']->ID(),0) : $_SESSION['support']->Image(),
			'titre'	=> (($item > 0) ? 'Dossier technique ' : '&Agrave; propos ').$_SESSION['support']->Du_support(),
			'page'	=> ($item > 0) ? 'pageHTML' : 'a_propos',
			'cache'	=> $_SESSION['support']->Pti_nom().' '.Creer_parametre($_SESSION['support']->ID(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item())];
} else { // le support demandé est absent ou n'existe pas => page d'index
	$support = null; // Destruction du support en cours. utiliser destructeur?
	return ['css'	=> 'style_page',
			'logo'	=> '<img src="Vue/images/logo.png" alt="logo">',
			'titre' => 'Liste des dossiers techniques',
			'page'	=> 'listeDsupports',
			'cache'	=> 'index'];
}
}
