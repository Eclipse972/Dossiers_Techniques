<?php
require"Modele/classe_Page.php";

class Page_nomenclature extends Page
{
	private $colonne_matière_vide;		// colone matière existe
	private $colonne_observation_vide;	// colone observation existe

	public function __construct(PEUNC\HttpRoute $route, array $TparamURL = [])
	{
		parent::__construct($route, $TparamURL);
		$this->setCSS("nomenclature");
		$this->setView("nomenclature.html");
		// détection de colonne matière vide
		$this->colonne_matière_vide = (PEUNC\BDD::SELECT("count(*) FROM Pieces WHERE matiere_ID > 0 AND support_ID = ?",
										[$this->route->getAlpha()]) == 0);

		// détection de colonne observation vide
		$this->colonne_observation_vide = (PEUNC\BDD::SELECT("count(*) FROM Pieces WHERE observation <> '' AND support_ID = ?",
											[$this->route->getAlpha()]) == 0);
	}

	public function InfoMatiere()
	{
		return ($this->colonne_matière_vide) ? "" : "\t<p>Cliquez sur le nom de la mati&egrave;re pour trouver sa définition sur wikip&eacute;dia dans un nouvel onglet.</p>\n";
	}

	public function ColonnesSupplementaires()
	{
		return	(($this->colonne_matière_vide)		? "" : "<th>Mati&egrave;re</th>")
			.	(($this->colonne_observation_vide)	? "" : "<th>Observations</th>")
			.	"\n";
	}

	public function CorpsNomenclature()
	{
		$Tnomenclature = PEUNC\BDD::SELECT("* FROM Vue_nomenclature WHERE support_ID = ?", [$this->route->getAlpha()]);
		$code = "";
		if (isset($Tnomenclature))
			foreach ($Tnomenclature as $ligne)
			{
				$code .= "\t<tr>\n\t\t{$ligne['repere']}\n\t\t{$ligne['lien_image']}\n\t\t{$ligne['designation']}\n";
				$code .= ($this->colonne_matière_vide)	 	? "" : "\t\t{$ligne['matiere']}\n" ;
				$code .= ($this->colonne_observation_vide)	? "" : "\t\t{$ligne['observation']}\n" ;
				$code .= "\t</tr>\n";
			}
		else throw new Exception("Nomenclature inexistante");
		return $code;
	}
}
