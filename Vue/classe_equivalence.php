<?php
$CE = new Classe_équivalence($_SESSION['support']->Dossier(), $T_instruction['param1'], $T_instruction['param2'], $T_instruction['param3']);
echo $CE->Code($T_instruction['param4']);
