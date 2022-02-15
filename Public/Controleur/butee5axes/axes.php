<?php // présentation des axes de la butée
ob_start();	// début du code <section>
?>
<h1>Pr&eacute;sentation des axes</h1>
<p>La but&eacute;e dispose de 5 axes. C&apos;est &agrave; dire qu&apos;il y a 5 possibilit&eacute;s de mouvement ind&eacute;pendantes.</p>
<p>Chaque axe est pr&eacute;sent&eacute; individuellement en cliquant dans le menu ci-contre.</p>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
