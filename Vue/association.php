<?php
$association = new Association_image_fichier($_SESSION->Dossier(), $T_instruction['param1'], $T_instruction['param2'], $T_instruction['param3']);
echo $association->Code($T_instruction['param4']);
