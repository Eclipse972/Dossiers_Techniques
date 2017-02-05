<?php
function Ligne_nomenclature($repere, $nombre, $designation, $matiere, $observation, $image, $fichier = null, $extension = '.EPRT') {
	echo "<tr>\n";
	echo "<td>", $repere, "</td>\n";

	if(!isset($fichier)) $fichier = $image;	// si le nom de fichier n'est pas précisé on prend le même que celui de l'image
	echo '<td>', Lien_image_fichier($_SESSION[SUPPORT]->dossier, $image, $fichier, $extension), '</td>',"\n";	// on ajoute le lien image-fichier

	echo "<td>", $designation;					// désignation
	if($nombre > 1) echo ' (x', $nombre, ')';	// si plusieurs exemplaires alors on rajoute la quantité
	echo "</td>\n";								// on ferme la cellule
	
	echo "<td>", $matiere, "</td>\n";		// matière
	echo "<td>", $observation, "</td>\n";	// observation	
	echo "</tr>\n\n";							// fin de la ligne
}	
?>

<h1>Nomenclature</h1>
<p>Cliquez sur l&#145;image de la pi&egrave;ce pour la t&eacute;l&eacute;charger.</p>
<p>Attention: les images ne sont pas &agrave; l&#145;&eacute;chelle.</p>
<div id="nomenclature">

<table>

<thead>
<tr>
<th>Rep</th>
<th>Image</th>
<th>D&eacute;signation<br>(x quantité)</th>
<th>Mati&egrave;re</th>
<th>Observations</th>
</tr>
</thead>

<tbody>
<?php
	// existence du fichier à tester et générer un message d'erreur si besoin
	include $_SESSION[SUPPORT]->dossier.'nomenclature.php';	// ce fichier ne contient que des instructions Ligne_nomenclature
?>
</tbody>

</table>
</div>
