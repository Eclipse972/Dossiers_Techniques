<?php // les classes d'équivalence' du moteur de modélisme
ob_start();	// début du code <section>
?>
<h1>Les classes d&apos;&eacute;quivalence</h1>
<p>Le moteur de mod&eacute;lisme est compos&eacute; de 4 classes d&apos;&eacute;quivalence.</p>
<div class="colonne">
<p>CE1: le b&acirc;ti</p>
<img src="/Supports/moteur2modelisme/images/CE1-bati.png" alt ="CE1: le b&acirc;ti">
</div>

<div class="colonne">
<p>CE2: le vilebrequin</p>
<img src="/Supports/moteur2modelisme/images/CE2-vilebrequin.png" width=305px alt ="CE2: le vilebrequin">
</div>

<div class="colonne">
<p>CE3: la bielle</p>
<img src="/Supports/moteur2modelisme/images/CE3-bielle.png" width=91px alt ="CE3: la bielle">
</div>

<div class="colonne">
<p>CE4: le piston</p>
<img src="/Supports/moteur2modelisme/images/CE4-piston.png" width=131px alt ="CE4: le piston">
</div>

<h2>Les roulements à billes du moteur</h2>
<img src="/Supports/moteur2modelisme/images/grand_roulement.png" width=200px alt ="grand roulement">
<img src="/Supports/moteur2modelisme/images/petit_roulement.png" width=160px alt ="petit roulement">
<p>Une fois les roulements mont&eacute;s, les bagues ext&eacute;rieures sont solidaires des al&eacute;sages du b&acirc;ti.
Et les bagues int&eacute;rieures sont solidaires du vilebrequin. Dans les deux cas les bagues des roulements seront
repr&eacute;sent&eacute;es en jaune.</p>
<p>Voir le menu ci-contre pour plus de d&eacute;tails sur chaque classe d&apos;&eacute;quivalence.</p>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
