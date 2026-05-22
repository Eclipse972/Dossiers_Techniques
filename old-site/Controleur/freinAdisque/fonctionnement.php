<?php // fonctionnement du frein &agrave; disque de la M&eacute;gane
ob_start();	// d&eacute;but du code <section>
?>
	<h1>Fonctionnement</h1>
	<div align=center>
		<iframe
			width="896" height="504"
			src="https://www.youtube.com/embed/4ZCPfgWiX2s"
			title="YouTube video player"
			frameborder="0"
			allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
			allowfullscreen>
		</iframe>
	</div>
<?php
$this->setSection(ob_get_clean());
