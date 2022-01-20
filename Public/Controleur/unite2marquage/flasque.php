<?php // MES de l'unité de marquage
ob_start();	// début du code <section>
?>
	<h1>Flasque</h1>
	<p style="text-align:center">Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>
	<a href="/Supports/unite2marquage/fichiers/flasque.EPRT"><img src="/Supports/unite2marquage/images/flasque.png" class="association" alt="association"></a>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
