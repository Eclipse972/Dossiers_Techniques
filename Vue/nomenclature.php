<?php
function Ligne_nomenclature($repere, $nombre, $designation, $matiere, $observation, $image, $fichier = null, $extension = '.EPRT') {
	echo "<tr>\n";
	echo "<td>", $repere, "</td>\n";

	if(!isset($fichier)) $fichier = $image;	// si le nom de fichier n'est pas précisé on prend le même que celui de l'image
	echo '<td>', Lien_image_fichier($image, $fichier, $extension, $designation), '</td>',"\n";	// on ajoute le lien image-fichier

	echo "<td>", $designation;					// désignation
	if($nombre > 1) echo ' (x', $nombre, ')';	// si plusieurs exemplaires alors on rajoute la quantité
	echo "</td>\n";								// on ferme la cellule
	
	echo "<td>", $matiere, "</td>\n";		// matière
	echo "<td>", $observation, "</td>\n";	// observation	
	echo "</tr>\n\n";							// fin de la ligne
}	
?>

<h1>Nomenclature</h1>
<p>Cliquez sur l&apos;image de la pi&egrave;ce pour la t&eacute;l&eacute;charger.</p>
<p>Attention: les images ne sont pas &agrave; l&apos;&eacute;chelle.</p>
<div id="nomenclature">

<table>

<thead>
<tr>
<th>Rep</th>
<th>Image</th>
<th>D&eacute;signation<br>(x quantit&eacute;)</th>
<th>Mati&egrave;re</th>
<th>Observations</th>
</tr>
</thead>

<tbody>	<?php $_SESSION[SUPPORT]->Afficher_nomenclature(); ?>	</tbody>

</table>
</div>
