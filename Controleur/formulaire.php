<?php // controleur du formulaire
function Configurer() { // renvoie l'objet du message du formulaire
list($id, $item, $sous_item) = Lire_parametre("f", 0, 1);

$BD = new base2donnees();
if (isset($_SESSION['support'])) {
	if ($_SESSION['support']->ID() > 0)
		$objet .= 'la page &laquo;'.$BD->Texte_item($_SESSION['support']->ID(), $_SESSION['support']->Item(), $_SESSION['support']->Sous_item()).'&raquo; '.$_SESSION['support']->Du_support();
	else
		$objet .= 'l&apos;archive ZIP';
} else
	$objet .= 'la liste de supports';
return ['css'	=> 'style_page',
		'logo'	=> '<img src="Vue/images/logo.png" alt="logo">',
		'titre'	=> 'Formulaire de contact',
		'page'	=> 'formulaire',
		'objet' => 'Exemple: &agrave; propos de '.$objet];
}
