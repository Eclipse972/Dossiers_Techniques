<?php // analyse fonctionnelles du cric hydraulique
ob_start();	// début du code <section>
?>
	<h1>Analyse fonctionnelle</h1>
	<p>Cette partie contient trois documents:</p>
	<ul>
	<li>Diagramme des int&eacute;racteurs</li>
	<li>Diagramme FAST "Levage du v&eacute;hicule"</li>
	<li>Diagramme FAST "D&eacute;pose du v&eacute;hicule"</li>
	</ul>
	<p>Cliquez dans le sous-menu pour plus de pr&eacute;cisions.</p>
<?php
$this->setSection(ob_get_clean());
