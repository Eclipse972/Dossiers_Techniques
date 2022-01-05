<?php
/* Contrôleur pour la mise en situation des supports
 * Dans a majorité des cas il s'agit d'un texte explicarif suivi d'une image
 * il suffit de créer trois variables
 * - $texte sous forme de code HTML
 * - $image: nom de l'image dans le repère image du support sans l'extension
 */

// valeurs si les variables ne sont pas définies dans le script MES.php
$texte = "R&eacute;daction de la mise en sitaion en cours ...";
$image = "mes.png";
$ImageAuDessus = false;

/* A la racine du dossier support créer le script MES.php. Il contiendra au plus 3 lignes
 * $texte = "...";
 * $image = "image.png"
 * $ImageAuDessus = true|false;
 * */
require"Supports/{$this->dossier}MES.php";

$this->setCommentaire($texte);
$this->setImage("/Supports/{$this->dossier}images/{$image}");
