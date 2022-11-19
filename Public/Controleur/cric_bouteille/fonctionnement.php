<?php // fonctionnement cric bouteille
ob_start();	// début du code <section>
?>
<h1>Fonctionnement</h1>
<p>Le cric bouteille fonctionne suivant deux modes: la mont&eacute;e et la descente (voir le sous-menu). Ils seront d&eacute;crit du point de vue externe (pour l'utilisateur) et du point de vue interne.</p>
<?php
$this->setSection(ob_get_contents());
ob_end_clean();
