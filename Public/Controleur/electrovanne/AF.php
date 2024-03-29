<?php // analyse fonctionnelles du cric hydraulique
ob_start();	// début du code <section>
?>
	<h1>Analyse fonctionnelle</h1>
	<p>L&apos;environnement de l&apos;&eacute;lectro-vanne est le suivant :</p>
	<ul>
		<li>le micro ordinateur &agrave; travers un circuit de commande</li>
		<li>le circuit hydraulique</li>
		<li>l&apos;environnement ext&eacute;rieur</li>
	</ul>
	<p>Le diagramme pieuvre de l&apos;&eacute;lectrovanne est le suivant:</p>
	<img src="/Supports/electrovanne/images/pieuvre.png" class=image_centree alt="diagramme pieuvre">

	<p>Fonctions de l&apos;&eacute;lectro-vanne :</p>
	<ul>
		<li>Fp : commander l&apos;ouverture et la fermeture d&apos;un circuit hydraulique à l&apos;aide d&apos;un micro-ordinateur.</li>
		<li>F1 : ne pas inonder le milieu ext&eacute;rieur.</li>
		<li>F2 : s&apos;adapter à l&apos;orifice d&apos;entr&eacute;e du circuit hydraulique.</li>
		<li>F3 : s&apos;adapter à l&apos;orifice de sortie du circuit hydraulique.</li>
	</ul>
<?php
$this->setSection(ob_get_clean());
