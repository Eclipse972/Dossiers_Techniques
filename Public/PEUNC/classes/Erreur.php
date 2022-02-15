<?php
/* classe page d'ereur de PEUNC
 *
 * Cette classe n'offre que des fonctions basiques. Par exemple pas de fonction complémentaire comme l'affichage.
 *
 * Il y a de fortes chances que votre classe pour vos pages d'erreur hérite d'une de vos classes. Du coup l'héritage multiple serait le bienvenu.
 * Il est posible de profiter des méthodes de la classe Erreur de PEUNC avec la méthode magique __call.
 * 1- dans votre classe ajouter: protected $OErreur;
 * 2- dans votre constructeur ajouter: $this->OErreur = new \PEUNC\Erreur;
 * 3- création de la méthode magique
 * public function __call($methode,$argument)	{
 *		return $this->OErreur->$methode($argument);
 * }
 * Une condition à respecter impérativement: aucune de vos méthode s ne doit porter le même nom que celle de la classe Erreur de PEUNC
 * */

namespace PEUNC;

class Erreur extends Page {
	protected $code;
	protected $tire;
	protected $corps;

	public function __construct($alpha, $beta, $gamma, $methode) {
		parent::__construct($alpha, $beta, $gamma, $methode);
		$this->code = null;
		$this->titre = "";
		$this->corps = "";
	}
	// setters
	public function setCodeErreur($code) {
		$this->code = $code;
	}

	public function setTitreErreur($titre) {
		$this->titre = $titre;
	}

	public function setCorpsErreur($code)	{
		$this->corps = $code;
	}
	// getters
	public function getCodeErreur() {
		return isset($this->code) ? ' ' . $this->code : 'X';
	}

	public function getTitreErreur() {
		return $this->titre;
	}

	public function getCorpsErreur() {
		return $this->corps;
	}
}
