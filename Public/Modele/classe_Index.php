<?php
class Index extends PEUNC\Page {

	public function __construct($alpha, $beta, $gamma, $methode, array $TparamURL = []) {
		parent::__construct($alpha, $beta, $gamma, $methode, $TparamURL);
		// valeurs par défaut
		$this->setTitle("Les dossiers techniques de ChristopHe");
		$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
		$this->setLogo("logo.png");
		$this->setFooter(" - <a href=/Contact>Me contacter</a>");
		$this->setView("index.html");
		$this->setCSS(array("index"));
	}

	public function Gerer_index($NB_colonne) {
		global $BD;
		$code = '';
		$Tréponse = $BD->ResultatSQL('SELECT * FROM Vue_code_vignettes', []);
		foreach($Tréponse as $id => $ligne) {	// récupère et agrège le code
			$No_colonne = $id % $NB_colonne;
			if($No_colonne==0) $code .=  '<tr>'."\n"; // nouvelle ligne
			$code .= "\t".$ligne['code']."\n";
			if($No_colonne==$NB_colonne-1) $code .= '</tr>'."\n";	// fin de ligne si dernière colonne atteinte
		}
		// si en sortie on s'arrete sur une colonne autre que la dernière
		if($No_colonne!=$NB_colonne-1) $code .= "</tr>\n"; // on termine la ligne
		return $code;
	}
}
