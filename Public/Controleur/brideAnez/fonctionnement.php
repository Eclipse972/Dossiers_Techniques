<?php // fonctionnement de la bride à nez
ob_start();	// début du code <section>
?>
	<h1>Fonctionnement de la bride &agrave; nez r&eacute;tractable</h1>
	<p>La bride &agrave; nez r&eacute;tractable est un &eacute;l&eacute;ment de serrage de marque DE-STA-CO. Elle est hydraulique et &agrave; double effet.</p>
	<ul>La sortie du nez de la bride s&apos;effectue en 2 phases :
	<li>1&egrave;re Phase : Le nez de la bride vient en but&eacute;e sur l&apos;axe Rep 11 d&apos;un mouvement de translation rectiligne.</li>
	<li>2&egrave;me Phase : Le nez de la bride effectue ensuite un mouvement de rotation autours de cet axe.</li>
	</ul>
	<p>En position de repos le nez de la bride est compl&egrave;tement rentr&eacute; et de ce fait, l&apos;op&eacute;rateur peut soulever le bras articul&eacute; et enlever la pi&egrave;ce usin&eacute;e.</p>
<?php
$this->setSection(ob_get_contents());
ob_end_clean();
