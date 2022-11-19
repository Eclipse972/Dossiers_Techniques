<?php // fonctionnemen étapes 3 e 4 préhenseur de culasse
ob_start();	// début du code <section>
?>
<h1>&Eacute;tape 3 et 4 du transfert</h1>
<p>Le portique remonte, les pr&eacute;henseurs effectuent une rotation  de trois quart de tour afin que le pr&eacute;henseur rest&eacute; &agrave; vide se positionne face &agrave; un centre d&apos;usinage.</p>
<img src="/Supports/prehenseur/images/etape3.png"  height=500px alt="&eacute;tape 3">
<img src="/Supports/prehenseur/images/etape4.png"  height=500px alt="&eacute;tape 4">
<?php
$this->setSection(ob_get_contents());
ob_end_clean();
