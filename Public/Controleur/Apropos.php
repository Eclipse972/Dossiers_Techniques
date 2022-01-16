<?php // page à propos en construction
ob_start();	// début du code <section>
?>
	<div id="page_image">
	<h1>D&eacute;sol&eacute; !</h1>
	<p align=center>Il semblerai que je n&apos;ai pas r&eacute;dig&eacute; la page "&agrave; propos" de ce support.</p>
	<?=$this->getLogo()?>
	<p align=center>N&apos;h&eacute;sitez pas &agrave; me contacter (lien en bas de page) si le probl&egrave;me persiste.</p>
	</div>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
