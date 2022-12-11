<?php // Mise en situation de la cambreuse
ob_start();	// début du code <section>
?>
<h1>Mise en situation</h1>
<p>Une entreprise de fabrication de fixation de ski a &eacute;t&eacute; confront&eacute;e &agrave; un probl&egrave;me
lors de la conception d&apos;un syst&egrave;me m&eacute;canique de freinage pour un nouveau produit.
</p>
<p>En effet la cin&eacute;matique de fonctionnement du frein a n&eacute;cessit&eacute; l&apos;obligation de cambrer
les branches pour que les patins de frein se trouvent dans le prolongement du ski
une fois la chaussure enclench&eacute;e dans la fixation (voir photos 1 et 2).
</p>
<img src="/Supports/cambreuse/images/photo1et2_mes.png"  alt="Photos 1 et 2">
<p>En raison du surmoulage « plastique » des patins de frein sur les branches en acier
(voir photo 1) il n&apos;a pas &eacute;t&eacute; possible de r&eacute;aliser cette op&eacute;ration en amont . Il a donc fallu
d&eacute;velopper une <b>machine sp&eacute;ciale</b> (voir photo 3) <b>pour cambrer les branches de frein</b>
apr&egrave;s l&apos;op&eacute;ration de surmoulage. (voir photos 4 et 4bis).
</p>
<img src="/Supports/cambreuse/images/photo34_et4bis_mes.png"  alt="photos 3, 4 et 4bis">
<?php
$this->setSection(ob_get_clean());
