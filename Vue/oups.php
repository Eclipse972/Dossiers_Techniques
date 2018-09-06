<div id="page_image">
<h1>D&eacute;sol&eacute; !</h1>
<p align=center>Il semblerai que je n&apos;ai pas r&eacute;dig&eacute; cette page.</p>
<?php
	$SUPPORT = unserialize($_SESSION['support']);
	echo $SUPPORT->Image();
?>
</div>
