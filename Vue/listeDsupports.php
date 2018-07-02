<header><p class="font-effect-outline">Liste des dossiers techniques</p></header>

<section>
	<h1>Cliquez sur l&apos;image ou le nom du support pour acc&eacute;der &agrave; son dossier technique</h1>
	<table>
	<?php
	$_SESSION = null; // on détruit le support en cours
	GererCache('Vue/sommaire', 'Vue/listeDsupports');
	?>
	</table>
</section>
