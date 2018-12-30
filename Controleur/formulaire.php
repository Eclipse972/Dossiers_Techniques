<?php // controleur du formulaire
include 'contexte.php';

function Configurer() { // détermine l'objet par défaut du message du formulaire
$BD = new base2donnees();
$valideur = new Valideur();
$_SESSION['validation'] = serialize($valideur);
$_SESSION['temps'] = time();

return ['css'	=> 'style_page',
		'logo'	=> '<img src="Vue/images/logo.png" alt="logo">',
		'titre'	=> 'Formulaire de contact (en construction)',
		'page'	=> 'formulaire',
		'objet' => 'Exemple: &agrave; propos de '.Contexte()];
}
