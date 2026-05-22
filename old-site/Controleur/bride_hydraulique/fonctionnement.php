<?php
// controleur fonctionnement de la bride hydraulique
ob_start();	// d&eacute;but du code <section>
?>
	<h1>Fonctionnement</h1>
	<p>En position de repos, la bride n’est pas alimentée en pression hydraulique, le ressort repousse le piston vers le bas.</p>
	<p>Il est donc possible de faire pivoter le levier suivant deux axes ( et ) pour libérer l’espace devant la bride et mettre correctement en position la pièce à brider par rapport à la table.</p>
	<p>Une fois la pièce positionnée, il suffit de remettre le levier dans l’alignement du piston et de régler, si nécessaire, la position de la vis d’appui 7 pour que celui-ci reste horizontal lors du serrage.</p>
	<p>Enfin, pour terminer le bridage, il suffit de commander l’alimentation de pression hydraulique qui exerce un effort sur le piston, effort qui par l’intermédiaire du levier sera transmis à la pièce à brider.</p>
	<p>La bride n’est pas le seul élément intervenant dans le blocage (liaison encastrement) de la pièce sur la table de la machine outil, cette dernière doit aussi être mise en position par des butées et / ou des guides,  fixés à cette table.</p>
<?php
$this->setSection(ob_get_clean());
