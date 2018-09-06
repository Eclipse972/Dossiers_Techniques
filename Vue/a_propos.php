<section>
<?php
$SUPPORT = unserialize($_SESSION['support']);
echo $SUPPORT->A_propos();
echo Lien('Retour au dossier technique '.$SUPPORT->Du_support(),$SUPPORT->ID());
?>
</section>
