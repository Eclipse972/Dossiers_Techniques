<?php // fonctionnement cric hydraulique: descente
ob_start();	// début du code <section>
?>
	<h1>Pour baisser un v&eacute;hicule</h1>
	<ol>
	<li>Placer le levier sur la vis de descente.
	<img src="/Supports/cric_hydraulique/images/vis2descente.png" style="height :150px; vertical-align: middle;" alt="vis de d&eacute;scente">
	</li>
	<li>A l&apos;aide du levier de manœuvre, ouvrez la vis de descente dans le sens inverse des aiguilles d&apos;une montre ce qui permet de lib&eacute;rer l&apos;huile contenue dans le v&eacute;rin.
	<img src="/Supports/cric_hydraulique/images/ouvrir_vis2descente.png" style="height :150px; vertical-align: middle;" alt="Ouvrir vis de d&eacute;scente">
	</li>
	<li>Le poids du v&eacute;hicule suffit pour obtenir la rentr&eacute;e de tige. Lorsque le v&eacute;hicule est en appui sur le sol, deux ressorts de rappel positionne le bras en position initiale.</li>
	</ol>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
