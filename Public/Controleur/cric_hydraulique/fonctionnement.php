<?php // fonctionnement cric hydraulique
ob_start();	// début du code <section>
?>
<h1>Le cric fonctionne suivant deux phases</h1>
<ul>
<li>la mont&eacute;e: l&apos;utilisateur va faire monter une partie du v&eacute;hicule</li>
<li>la descente: l&apos;utilisateur va faire descendre le v&eacute;hicule puis retirer le cric</li>
<li> Pour utiliser correctement le cric, il y a quelques pr&eacute;cautions à prendre</li>
</ul>
<p>Cliquez dans le sous-menu pour plus de pr&eacute;cisions.</p></section>
<?php
$this->setSection(ob_get_contents());
ob_end_clean();
