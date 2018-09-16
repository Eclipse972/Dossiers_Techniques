<?php // controleur du formulaire
function Configurer() { // détermine l'objet par défaut du message du formulaire
$BD = new base2donnees();
$valideur = new Valideur();
$_SESSION['validation'] = serialize($valideur);

if (isset($_SESSION['support'])) {
	$oSupport = unserialize($_SESSION['support']);
	if ($oSupport->ID() > 0)
		$objet = 'la page &laquo;'.$BD->Texte_item($oSupport->ID(), $oSupport->Item(), $oSupport->Sous_item()).'&raquo; '.$oSupport->Du_support();
	else
		$objet = 'l&apos;archive ZIP';
} else	$objet = 'la liste de supports';

return ['css'	=> 'style_page',
		'logo'	=> '<img src="Vue/images/logo.png" alt="logo">',
		'titre'	=> 'Formulaire de contact (en construction)',
		'page'	=> 'formulaire',
		'objet' => 'Exemple: &agrave; propos de '.$objet];
}
