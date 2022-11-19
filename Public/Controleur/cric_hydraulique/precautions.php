<?php // fonctionnement cric hydraulique: précautions
ob_start();	// début du code <section>
?>
	<h1>Pr&eacute;cautions d’utilisation</h1>
	<ul>
	<li>Contr&ocirc;ler la masse du v&eacute;hicule avant utilisation. ( m &lt; 2000 kg)</li>
	<li>&Eacute;viter un maintien en charge prolong&eacute; ; placer une chandelle pour soulager le cric dans ce cas d'utilisation.</li>
	<li>Utiliser le cric sur un sol "lisse" permettant l'auto-positionnement du cric par rapport &agrave; la sellette lors du soul&egrave;vement. Ce positionnement est facilit&eacute; lorsque le cric est perpendiculaire au v&eacute;hicule.</li>
	<li>Il faut toujours v&eacute;rifier que le cric reste à plat sur le sol et que la charge soit centr&eacute;e par rapport à la sellette du cric. </li>
	<li>V&eacute;rifier le niveau d'huile r&eacute;guli&egrave;rement.</li>
	</ul>
 <?php
$this->setSection(ob_get_contents());
ob_end_clean();
