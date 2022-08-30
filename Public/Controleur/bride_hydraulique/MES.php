<?php
// controleur Mise en situation de la bride hydraulique
ob_start();	// d&eacute;but du code <section>
?>
	<h1>Mise en situation</h1>
	<p>Le syst&egrave;me &eacute;tudi&eacute; ici est une bride hydraulique utilis&eacute;e
	pour effectuer le serrage d&apos;une pi&egrave;ce sur une machine outil.</p>
	<p>L&apos;avantage d&apos;un tel syst&egrave;me par rapport &agrave; un bridage manuel, est la possibilit&eacute; de remplacer rapidement la pi&egrave;ce usin&eacute;e par la nouvelle pi&egrave;ce. Lors de fabrications en s&eacute;rie, le gain de temps peut-&ecirc;tre tr&egrave;s important.</p>
	<img src="/Supports/bride_hydraulique/images/mes.png" height=99px class=association alt="Mise en situation">
<?php
$this->setSection(ob_get_contents());
ob_end_clean();

