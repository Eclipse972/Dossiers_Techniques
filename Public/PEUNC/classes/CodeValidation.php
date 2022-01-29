<?php
namespace PEUNC;

class CodeValidation {
	/*
	 * Le code de validation est un mot de 5 caractères composé d'une lettre de chaque champ (soit 4 lettres).
	 * Pour le choix du caractère il y a quatre possibilités: premier, deuxième, avant dernier et dernier
	 * la dernière lettre est une des 4 premières du code.
	 *
	 * Exemple de validation:
	 * 	deuxième caractère de l'objet
	 * 	avant dernier caractère du message
	 *  deuxième caractère de votre courriel
	 *  dernier caractère de votre nom
	 *  quatrième caractère de ce code de validation
	 * Si les champs sont :
	 * 		nom =  Eclipse972
	 * 		courriel = christophe.hervi@free.fr
	 * 		objet = Question
	 * 		message = Pourquoi un code si compliqué?
	 * Le code de validation sera uéh22
	*/

	public function _construct() {
		//
	}

	public function Afficher() {
?>
	<div id=validation>
		<p>Validation du formulaire</p>
		<ul>
			<li>premier caractère</li>
			<li>deuxième caractère</li>
			<li>troisième caractère</li>
			<li>quatrième caractère</li>
			<li>dernier caractère</li>
		</ul>
		<p>Code	<input type="text" name="code" style="width:100px;" /></p>
	</div>
<?php
	}

	public function CodeOK($nom, $courriel, $objet, $message) {

	}
}
