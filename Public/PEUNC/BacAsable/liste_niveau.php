<?php
require"PEUNC/BacAsable/commun.php";

function Liste_niveau_v2($alpha = null, $beta = null)
{
	global $BD;
	if(!isset($alpha))
	{	// pour les onglets
		$eqAlpha= ">=0";
		$eqBeta	= "=0";
		$eqGamma= "=0";
		$indice	= "alpha";
		$param	= [];
	}
	elseif(!isset($beta))
	{	// pour le menu
		$eqAlpha= "=?";
		$eqBeta = ">0";
		$eqGamma= "=0";
		$indice = "beta";
		$param	= [$alpha];
	}
	else
	{	// pour le sous-menu
		$eqAlpha= "=?";
		$eqBeta = "=?";
		$eqGamma= ">0";
		$indice = "gamma";
		$param	= [$alpha, $beta];
	}
	$Treponse = $BD->ResultatSQL("SELECT {$indice} AS i, code FROM Vue_code_item
							WHERE alpha{$eqAlpha} AND beta{$eqBeta} AND gamma{$eqGamma}
							ORDER BY alpha, beta, gamma",
							$param
						);
	$Tableau = [];
	foreach($Treponse as $ligne)
		$Tableau[(int)$ligne["i"]] = $ligne["code"];

	return $Tableau;
}

ob_start();
?>
<p>Pour le niveau 1</p>
<ul>
<?php

foreach(Liste_niveau_v2() as $i => $ligne)
{
	echo "\t<li>{$i} - {$ligne}</li>\n";
}
?>
</ul>
<p>Pour le niveau 2 avec alpha=3</p>
<ul>
<?php

foreach(Liste_niveau_v2(3) as $i => $ligne)
{
	echo "\t<li>{$i} - {$ligne}</li>\n";
}
?>
</ul>
<p>Pour le niveau 3 avec alpha=3 et beta=2</p>
<ul>
<?php

foreach(Liste_niveau_v2(3,2) as $i => $ligne)
{
	echo "\t<li>{$i} - {$ligne}</li>\n";
}
?>
</ul>
<?php
$tampon = ob_get_contents();
ob_clean();
$this->setSection($tampon);
