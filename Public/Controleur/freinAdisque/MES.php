<?php // MES du frein &agrave; disque de la M&eacute;gane
ob_start();	// d&eacute;but du code <section>
?>
	<h1>Mise en situation</h1>
	<p>Le frein &agrave; disque est un syst&egrave;me utilisant un disque fix&eacute; sur le moyeux
	de la roue 	et des plaquettes venant frotter de chaque côt&eacute; du disque.</p>
	<img src="/Supports/freinAdisque/images/mes.png" height=px class=association alt="Mise en situation">
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
