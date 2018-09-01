<?php // controleur du formulaire
function Configurer() { // renvoie l'objet du message du formulaire
$BD = new base2donnees();
$support = (isset($_SESSION['support'])) ? unserialize($_SESSION['support']) : null;
if (isset($support))
	if ($support->ID() > 0)
		$objet .= 'la page &laquo;'.$BD->Texte_item($support->ID(), $support->Item(), $support->Sous_item()).'&raquo; '.$support->Du_support();
	else
		$objet .= 'l&apos;archive ZIP';
else
	$objet .= 'la liste de supports';
return ['css'	=> 'style_page',
		'logo'	=> '<img src="Vue/images/logo.png" alt="logo">',
		'titre'	=> 'Formulaire de contact',
		'page'	=> 'formulaire',
		'objet' => 'Exemple: &agrave; propos de '.$objet];
}
