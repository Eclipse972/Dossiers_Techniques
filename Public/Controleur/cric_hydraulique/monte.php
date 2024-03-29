<?php // fonctionnement cric hydraulique: montée
ob_start();	// début du code <section>
?>
	<h1>Pour lever un v&eacute;hicule</h1>
	<ol>
	<li>Garer le v&eacute;hicule sur une surface plane et dure. Assurez-vous que le frein à main est bloqu&eacute; et que le v&eacute;hicule a une bonne stabilit&eacute;.</li>
	<li>A l&apos;aide du levier de manœuvre, fermez la vis de descente dans le sens des aiguilles d&apos;une montre.<br>
	<img src="/Supports/cric_hydraulique/images/vis2descente.png" style=height:180px alt="vis de d&eacute;scente">
	<img src="/Supports/cric_hydraulique/images/fermer_vis2descente.png" style=height:180px alt="Fermer vis de d&eacute;scente">

	</li>
	<li>Positionner le cric sous le châssis du v&eacute;hicule en plaçant la sellette sous le bas de caisse.</li>
	<li><img src="/Supports/cric_hydraulique/images/pomper.png" style=height:180px;float:right; alt="pomper pour lever le v&eacute;hicule">
		Placer le levier dans la gouge de commande de la pompe. Agir sur le levier par un mouvement alternatif "haut bas" pour actionner la pompe et soulever la sellette par l&apos;interm&eacute;diaire du bras et du v&eacute;rin.
		<ul>
		<li>Phase d&apos;approche : La sellette s&apos;&eacute;l&egrave;ve mais n&apos;est pas en appui sous le bas de caisse, le v&eacute;hicule n&apos;est pas soulev&eacute;.</li>
		<li>Phase travail : Lorsque la sellette s&apos;appuie sur le châssis, la caisse du v&eacute;hicule est soulev&eacute;e puis, lorsque la longueur de  d&eacute;battement de la suspension est obtenue, la roue s&apos;&eacute;l&egrave;ve.</li>
		</ul>
	</li>
	<li>Effectuer l&apos;op&eacute;ration de maintenance.</li>
	</ol>
	<p>ATTENTION : le cric est uniquement un appareil de levage. Apr&egrave;s levage, toujours utiliser un support de s&eacute;curit&eacute; avant d&apos;effectuer votre r&eacute;paration. Ne jamais utiliser le cric au-delà des capacit&eacute;s indiqu&eacute;es(2 tonnes).
	</p>
<?php
$this->setSection(ob_get_clean());
