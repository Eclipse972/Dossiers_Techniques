<?php // fonctionnement de l'unité de marquage'
ob_start();	// début du code <section>
?>
	<div id="page_image">
	<h1>D&eacute;sol&eacute; !</h1>
	<p align=center>Il semblerai que je n&apos;ai pas r&eacute;dig&eacute; cette page.</p>
	<img src="/Supports/unite2marquage/images/unite2marquage.png"  alt="l&apos;unit&eacute; de marquage">
	<p align=center>N&apos;h&eacute;sitez pas &agrave; me contacter (lien en bas de page) si le probl&egrave;me persiste.</p>
	</div>
<	<p>En position de repos le nez de la bride est compl&egrave;tement rentr&eacute; et de ce fait, l&apos;op&eacute;rateur peut soulever le bras articul&eacute; et enlever la pi&egrave;ce usin&eacute;e.</p>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
