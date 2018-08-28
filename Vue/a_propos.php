<section>
<?php
echo $_SESSION['support']->A_propos();
echo Lien('Retour au dossier technique '.$_SESSION['support']->Du_support(),$_SESSION['support']->ID());
?>
</section>
