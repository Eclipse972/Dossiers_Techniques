<?php // MES de la pince de marquage
ob_start();	// début du code <section>
?>
<h1>Mise en situation</h1>
<p>Les unit&eacute;s de marquage ont &eacute;t&eacute; conçues &agrave; la demande de l&apos;industrie automobile pour r&eacute;pondre au mieux aux probl&egrave;mes de « Traçabilit&eacute; » des douilles d&apos;ampoule des phares de certaines voitures. Elles permettent de marquer un num&eacute;ro &agrave; 4 caract&egrave;res, qui d&eacute;finit une s&eacute;rie de fabrication. (Hauteur du caract&egrave;re : 4 mm pour une profondeur de marquage de 0,2 mm)</p>
<img src="/Supports/pince2marquage/images/presentation.png" class=image_centree alt="Pr&eacute;sentation">
<img src="/Supports/pince2marquage/images/douille.png" class=image_centree alt="Douille marqu&eacute;e">
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
