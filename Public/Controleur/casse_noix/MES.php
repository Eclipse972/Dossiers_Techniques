<?php // MES du casse-noix
ob_start();	// début du code <section>
?>
<h1>Mise en situation</h1>
<p>Ce syst&egrave;me permet de casser des noix. Pour cela, il suffit de placer une noix sur la r&eacute;hausse (rep&egrave;re 7 voir la nomenclature) et de baisser le levier (rep&egrave;re 2). Le piston (rep&egrave;re 5) va alors descendre et &eacute;craser la noix contre la r&eacute;hausse et la casser.</p>

<div class="colonne">
<h2>levier lev&eacute;</h2>
<img src="/Supports/casse_noix/images/levier_leve.png" style=width:300px alt="levier lev&eacute;">
</div>

<div class="colonne">
<h2>levier baiss&eacute;e</h2>
<img src="/Supports/casse_noix/images/levier_baisse.png" style=width:300px alt="levier baiss&eacute;e">
</div>
<?php
$this->setSection(ob_get_clean());
