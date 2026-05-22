<?php // fonctionnement de l'extracteur de roulement
ob_start();
?>
	<h1>Fonctionnement</h1>
	<p>Exemple d&apos;utilisation d&apos;un extracteur de roulement.</p>
	<div align=center>
		<iframe width="896" height="504"
			src="https://www.youtube-nocookie.com/embed/XB1d_qdb9uk"
			title="YouTube video player"
			frameborder="0"
			allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
			allowfullscreen>
		</iframe>
	</div>
<?php
$this->setSection(ob_get_clean());
