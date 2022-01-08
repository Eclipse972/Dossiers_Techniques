<?php // MES du cric bouteille
ob_start();	// début du code <section>
?>
<h1>Mise en situation</h1>
<p>Le cric bouteille est uniquement un appareil de levage, pour effectuer des r&eacute;parations sur un v&eacute;hicule, utiliser des chandelles de s&eacute;curit&eacute;. Il doit &ecirc;tre utilis&eacute; sur une surface plane et dure.</p>
<img src="/Supports/cric_bouteille/images/mes.png"  alt="Mise en situation">
<p> Il est dot&eacute; d'une soupape de s&eacute;curit&eacute; en cas de surcharge</p>
<img src="/Supports/cric_bouteille/images/cric_reel.png"  alt="cric r&eacute;el">
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
