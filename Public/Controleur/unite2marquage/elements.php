<?php // MES du préhenseur de culasse
ob_start();	// début du code <section>
?>
	<h1>&Eacute;l&eacute;ments constitutuifs</h1>
	<p style="text-align:center">Cliquez sur l&apos;image pour t&eacute;l&eacute;charger le fichier associ&eacute;.</p>
	<a href="/Supports/unite2marquage/fichiers/unite2marquage.EASM"><img src="/Supports/unite2marquage/images/unite2marquage.png" class="association" alt="association"></a>
	<p style="text-align:center">Cliquez dans le menu pour afficher les &eacute;l&eacute;ments individuellement.</p><p>ATTENTION: ces &eacute;l&eacute;ments ne sont pas des classes d&apos;&eacute;quivalence.</p>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
