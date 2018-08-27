<?php // controleur erreur
function Configurer($bd) {
$code = (int) $_GET['code'];
switch ($code) { // voir .htaccess
case 403:
	$message = 'Acc&egrave;s interdit';
	break;
case 404:
	$message = 'Cette page n&apos;existe pas';
	break;
case 500:
	$message = 'Serveur satur&eacute;: essayez de recharger la page';
	break;
default:
	$message = 'Erreur inconnue';
	$code = '';
}
return ['css'	=> 'style_page',
		'logo'	=> '<img src="Vue/images/logo.png" alt="logo">',
		'titre'	=> 'Erreur '.$code,
		'page'	=> 'erreur',
		'cache'	=> null,
		'message' => $message];
}
