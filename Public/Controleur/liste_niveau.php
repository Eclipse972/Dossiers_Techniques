<?php
function Liste_niveau_v2($alpha = null, $beta = null)
{
	global $BD;
	if(!isset($alpha))
	{	// pour les onglets
		$eqAlpha= ">= 0";
		$eqBeta	= "= 0";
		$eqGamma= "= 0";
		$indice	= "alpha";
		$param	= [];
	}
	elseif(!isset($beta))
	{	// pour le menu
		$eqAlpha= "= ?";
		$eqBeta = "> 0";
		$eqGamma= "= 0";
		$indice = "beta";
		$param	= [$alpha];
	}
	else
	{	// pour le sous-menu
		$eqAlpha= "= ?";
		$eqBeta = "= ?";
		$eqGamma= "> 0";
		$indice = "gamma";
		$param	= [$alpha, $beta];
	}
	$Treponse = $BD->ResultatSQL("SELECT {$indice} AS i, code FROM Vue_code_item
							WHERE alpha{$eqAlpha} AND beta{$eqBeta} AND gamma{$eqGamma}",
							$param
						);
	$Tableau = [];
	foreach($Treponse as $ligne)
	{
		$i = (int)$ligne["i"];
		$Tableau[$i] = $ligne["code"];
	}
	return $Tableau;
}

$this->setTitle("Les dossiers techniques de ChristopHe");
$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
$this->setLogo("logo.png");
$this->setFooter(" - <a href=/Contact>Me contacter</a>");
$this->setView("bacAsable.html");
$this->setCSS([]);

ob_start();
?>
<p>Pour le niveau 3 avec alpha=3 et beta=2</p>
<ul>
<?php

foreach(Liste_niveau_v2(3) as $i => $ligne)
{
	echo "\t<li>{$i} - {$ligne}</li>\n";
}
?>
</ul>
<?php
$tampon = ob_get_contents();
ob_clean();
$this->setSection($tampon);
