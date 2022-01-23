<?php
// classes page de contact de PEUNC
namespace PEUNC;

class Contact extends Page {
	public function __construct() {
		parent::__construct();
	}

	public function PrepareFormulaireContact() {
	}

	public function TraiteFormulaireContact()	{
	}

	public function Afficher_validation()	{
		for($i=0;$i<5;$i++)	echo "\n\t\t\t<li>critère</li>";
		echo "\n";
	}
}
