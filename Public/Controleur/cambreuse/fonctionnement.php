<?php // fonctionnement cambreuse
ob_start();	// début du code <section>
?>
<h1>Fonctionnement</h1>
<p>La mise en forme se fait en trois &eacute;tapes d&eacute;crites dans le sous-menu.</p></section>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
