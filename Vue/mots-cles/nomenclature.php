<h1>Nomenclature</h1>
<p>Cliquez sur l&apos;image de la pi&egrave;ce pour la t&eacute;l&eacute;charger au format eDrawing.</p>
<p>Cliquez sur le nom de la mati&egrave;re pour trouver sa défition sur wikip&eacute;dia dans un nouvel onglet.</p>

<table id="nomenclature">
<thead>
<tr>
<th>Rep</th>
<th>Image</th>
<th>D&eacute;signation (x quantit&eacute;)</th>
<th>Mati&egrave;re</th>
<th>Observations</th>
</tr>
</thead>

<tbody>
<?php
$nomenclature = $SUPPORT->Nomenclature();
if (isset($nomenclature))
	foreach ($nomenclature as $piece) echo $piece->Code();
else trigger_error('Nomenclature inexistante', E_USER_WARNING);
?>
</tbody>
</table>
<p>Attention: les images ne sont pas &agrave; l&apos;&eacute;chelle.</p>