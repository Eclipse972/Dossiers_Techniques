<?php	// présentation es classe d'équivalence de l'étau de modéliste
ob_start();	// début du code <section>
?>
<h1>Classes d&apos;&eacute;quivalence</h1>
<p>L&apos;&eacute;tau est compos&eacute; de quatre classes d&apos;&eacute;quivalence et de quatre liaisons.</p>
<p>Mors fixe</p>
<img src="/Supports/etau/images/CE_mors_fixe.png" class="association" alt="Mors fixe">
<p>Mors mobile</p>
<img src="/Supports/etau/images/CE_mors_mobile.png" class="association" alt="Mors mobile">
<p>Vis de manoeuvre</p>
<img src="/Supports/etau/images/CE_vis_de_manoeuvre.png" class="association" alt="Vis de manoeuvre">
<p>Tige de poign&eacute;e</p>
<img src="/Supports/etau/images/CE_tige_de_poignee.png" class="association" alt="Tige de poignée">
<?php
$this->setSection(ob_get_clean());
