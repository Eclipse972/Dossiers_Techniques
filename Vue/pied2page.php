<p>Site optimis&eacute; pour <img src="Vue/images/chrome.png" alt="Chrome"> et <img src="Vue/images/firefox.png" alt="Firefox"> - 
 <?php // le pied de page utilise un lien paramétré
 if (isset($_SESSION))
	echo Lien('Me contacter', $_ID, 0, 1);
else
	echo Lien('Me contacter', 0, 0, 1); //en attendant de trouver une solution
 ?>
 - derni&egrave;re mise à jour: 24 ao&ucirc;t 2018</p>
