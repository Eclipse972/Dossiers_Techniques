<?php // dessins de définition de la butée
ob_start();	// début du code <section>
?>
<h1>Dessins de d&eacute;finition</h1>
<p>Les dessins de d&eacute;finition de certaines pi&egrave;ces de la but&eacute;e 5 axes sont disponibles. La liste est affich&eacute;e dans le menu.</p>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
