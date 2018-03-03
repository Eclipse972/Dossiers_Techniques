<h1>Nomenclature</h1>
<p>Cliquez sur l&apos;image de la pi&egrave;ce pour la t&eacute;l&eacute;charger au format eDrawing.</p>
<p>Cliquez sur le nom de la mati&egrave;re pour trouver sa défition sur wikip&eacute;dia dans un nouvel onglet.</p>

<table id="nomenclature">
<thead>
<tr>
<th>Rep</th>
<th>Image</th>
<th>D&eacute;signation<br>(x quantit&eacute;)</th>
<th>Mati&egrave;re</th>
<th>Observations</th>
</tr>
</thead>

<tbody>
<?php
	$connexionBD = new base2donnees;	
	$nomenclature = $connexionBD->Nomenclature($_SESSION[ID]);
	$connexionBD->Fermer();
	if (isset($nomenclature)) {
		foreach ($nomenclature as $piece) $piece->Afficher();
	} else echo '<h1>Erreur Nomenclature</h1>';?>
</tbody>
</table>
<p>Attention: les images ne sont pas &agrave; l&apos;&eacute;chelle.</p>
