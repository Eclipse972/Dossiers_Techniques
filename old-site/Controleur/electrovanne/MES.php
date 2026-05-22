<?php // MES électrovanne
ob_start();	// début du code <section>
?>
<h1>Mise en situation</h1>
<p>Cette &eacute;lectrovanne est un &eacute;l&eacute;ment du circuit d&apos;irrigation de serre de culture de tomates permettant l&apos;arrosage des diff&eacute;rentes zones de culture. Ces &eacute;lectrovannes sont command&eacute;es par un micro-ordinateur qui gère l&apos;organisation mat&eacute;rielle de la serre : conditions climatiques, alimentation en CO2, arrosage.</p>
<img src="/Supports/electrovanne/images/electrovanne.png"  alt="Electrovanne">
<p>L'&eacute;lectro-vanne dans la chaîne de commande</p>
<img src="/Supports/electrovanne/images/chaine_commande.png"  alt="Chaine de commande">
<?php
$this->setSection(ob_get_clean());
