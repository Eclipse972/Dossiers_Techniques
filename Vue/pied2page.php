<p>Site optimis&eacute; pour <img src="Vue/images/chrome.png" alt="Chrome"> et <img src="Vue/images/firefox.png" alt="Firefox">
<?php // le pied de page utilise un lien paramétré
if ($MODE == 'DT') {
	echo ' - ';
	if (isset($_SESSION['support']))
		echo Lien_formulaire($_SESSION['support']->ID()+1, $_SESSION['support']->Item(), $_SESSION['support']->Sous_item());
	else
		echo Lien_formulaire(0);
	}
?>
 - derni&egrave;re mise à jour: 27 ao&ucirc;t 2018</p>
