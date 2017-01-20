<?php
function Ligne_nomenclature($repere, $nombre, $designation, $matiere, $observation, $lien_image) {
	echo "<tr>\n";
	echo "<td>", $repere, "</td>\n";
	
	echo "<td>", $lien_image, "</td>\n";		// on ajoute le lien image
	
	echo "<td>", $designation;					// désignation
	if($nombre > 1) echo ' (x', $nombre, ')';	// si plusieurs exemplaires alors on rajoute la quantité
	echo "</td>\n";								// on ferme la cellule
	echo "<td>", $matiere, "</td>\n";			// matière
	echo "<td>", $observation, "</td>\n";		// observation	
	echo "</tr>\n";								// fin de la ligne
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
foreach ($_SESSION[SUPPORT]->nomenclature as $rep => $piece) {
	Ligne_nomenclature($rep, $piece->quantite, $piece->designation, $piece->matiere, $piece->observation, $piece->lien);
}
?>
</tbody>

</table>
</div>