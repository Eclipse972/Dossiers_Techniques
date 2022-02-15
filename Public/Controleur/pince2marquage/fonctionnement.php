<?php // fonctionnement de la pince de marquage
ob_start();	// début du code <section>
?>
<h1>Fonctionnement</h1>
<p>La pince de marquage est constitu&eacute;e de 2 &eacute;l&eacute;ments : un v&eacute;rin pneumatique et une t&ecirc;te de marquage. L&apos;unit&eacute; pneumatique peut &ecirc;tre modifi&eacute;e suivant les besoins.</p>
<p>Le v&eacute;rin pneumatique actionne par l&apos;interm&eacute;diaire de la came (rep&egrave;re 14) la fermeture des bras (rep&egrave;res 8 et 9). L&apos;enclume et le poinçon viennent marquer la douille de lampe par &eacute;crasement de la mati&egrave;re plastique, assurant ainsi l&apos;impression en creux des num&eacute;ros.</p>
<p>Lorsque celle-ci est effectu&eacute;e, un capteur inductif donne l&apos;ordre &agrave; la tige de v&eacute;rin de rentrer et le ressort de rappel (rep&egrave;re 25) ram&egrave;ne les bras en position initiale.</p>
<h1>Caract&eacute;ristiques</h1>
<ul>
<li>V&eacute;rin pneumatique :
	<ul>
	<li>Ø du piston: 36 mm</li>
	<li>Course du v&eacute;rin: 14 mm</li>
	<li>Pression dans le v&eacute;rin: 0.6 MPa</li>
	</ul>
</li>
<li>Op&eacute;rationnelles :
	<ul>
	<li>Fr&eacute;quence: 2400 marquages/jour (soit 1 coup toutes les 36 s)</li>
	<li>Dur&eacute;e de vie: 6 millions de manœuvres</li>
	<li>Angle d&apos;ouverture maxi: 10°</li>
	</ul>
</li>
</ul>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
