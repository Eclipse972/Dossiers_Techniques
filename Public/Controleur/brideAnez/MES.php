<?php
// mise en situation de la bride à nez
ob_start();	// début du code <section>
?>
<h1>Bo&icirc;tier de raccord rotatif</h1>
<p>Le bo&icirc;tier de raccord rotatif est un &eacute;l&eacute;ment de l&apos;ensemble raccord rotatif destin&eacute; &agrave; &eacute;quiper une unit&eacute; de distribution d&apos;eau min&eacute;rale.</p>
<div class="colonne">
<h2>Unit&eacute; de distribution d&apos;eau</h2>
<img src="/Supports/brideAnez/images/unite_distribution_eau.png" style=width:500px alt="Unit&eacute; de distribution d&apos;eau">

</div>
<div class="colonne">
<h2>Raccord rotatif</h2>
<img src="/Supports/brideAnez/images/raccord.png" style=width:300px alt="raccord rotatif virtuel">
</div>
<h1>Mise en situation</h1>
<p>Un montage de bridage permet d&apos;assurer la mise et le maintient en position des bo&icirc;tiers des raccords tournants pour l&apos;ensemble des op&eacute;rations (perçages, taraudages et lamages radiaux).</p>
<ul>Ce montage est constitu&eacute; de (voir FIG 1)
<li>Un bras articul&eacute; fix&eacute; sur le montage qui vient en appui sur la pi&egrave;ce.</li>
<li>Une bride &agrave; nez r&eacute;tractable fix&eacute;e sur le montage.</li>
</ul>
<p>L&apos;ensemble est mont&eacute; sur un plateau tournant d&apos;un centre d&apos;usinage 4 axes.</p>
<p>L&apos;alimentation hydraulique se fait par les tuyaux flexibles.</p>
<img src="/Supports/brideAnez/images/figure1.png" style=width:900px class=image_centree alt="bride dans son contexte">
<?php
$this->setSection(ob_get_contents());
ob_end_clean();
