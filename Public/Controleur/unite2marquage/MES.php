<?php // MES de l'unité de marquage
ob_start();	// début du code <section>
?>
<h1>Mise en situation</h1>
<img src="/Supports/unite2marquage/images/usine.png"  alt="chaine 2 montage">
<p>Les unit&eacute;s de marquage ont &eacute;t&eacute; con&cedil;ues &agrave; la demande de l&apos;industrie automobile fran&cedil;aise pour r&eacute;pondre au mieux
aux probl&egrave;mes de « tra&cedil;abilit&eacute; » des t&ocirc;les dans les ateliers de ferrage (assemblage des &eacute;l&eacute;ments de carrosserie). Elles
permettent de marquer par embossage un num&eacute;ro de 8 caract&egrave;res, dont 7 incr&eacute;ment&eacute;s en automatique, sur les organes de
s&eacute;curit&eacute; (hauteur du caract&egrave;re : 4 mm pour une profondeur de marquage de 0,2 mm).</p>

<img src="/Supports/unite2marquage/images/photo.png"  alt="unité de marquage">
<p>L&apos;unit&eacute; de marquage est constitu&eacute;e de 2 &eacute;l&eacute;ments : une presse et une t&ecirc;te de marquage (Celle-ci peut d&apos;ailleurs
&agrave; tout moment &ecirc;tre remplac&eacute;e par une t&ecirc;te de serrage). L&apos;unit&eacute; pneumatique se d&eacute;cline en 3 tailles, la plus petite
pouvant se monter &agrave; l&apos;extr&eacute;mit&eacute; d&apos;un bras robotis&eacute;.</p>
<?php
$this->setSection(ob_get_clean());
