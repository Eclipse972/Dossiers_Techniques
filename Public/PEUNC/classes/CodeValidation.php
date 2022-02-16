<?php
namespace PEUNC;

/* Le code de validation est un mot de 5 caractères composé d'une lettre de chaque champ (soit 4 lettres).
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
 * */

class CodeValidation
{
	private $T_id_champ;	// tableau contenant les numéros de champ
	private $T_choix;		// tableau contenant les positions demandées
	private $dernier_choix; // dernière instruction: position du caractère du code de validation

	public function __construct($T_id_champ = null, $T_choix = null, $dernier_choix = null)
	{
		if ((isset($T_id_champ)) && (isset($T_choix)) && (isset($dernier_choix)))
		{
			for($i=0; $i<4; $i++)	// i-ème instruction
			{
				$this->T_id_champ[$i] = $T_id_champ[$i];// numéro du champ
				$this->T_choix[$i] = $T_choix[$i];		// choix du caractère
			}
			$this->dernier_choix = $dernier_choix;		// choix du dernier caractère
		}
		else
		{
			for($i=0; $i<4; $i++)	// i-ème instruction
			{
				$this->T_id_champ[$i] = $i;		// numéro du champ
				$this->T_choix[$i] = rand(0,3);	// choix du caractère
			}
			shuffle($this->T_id_champ);			// on mélange l'ordre des champs
			$this->dernier_choix = rand(0,3);	// choix du dernier caractère
		}
	}

	public function Afficher()
	{
		$champs		= array('de votre nom', 'de votre courriel', 'de l&apos;objet', 'du message');
		$position	= array('premier', 'deuxi&egrave;me', 'avant dernier', 'dernier'); // => il faut au moins deux caratères pour le champ

		$code = "<ul>\n";
		for($i=0; $i<4; $i++)	$code .= "\t\t\t<li>{$position[$this->T_choix[$i]]} caract&egrave;re {$champs[$this->T_id_champ[$i]]}</li>\n";
		// dernier caractère
		$position = array('premier', 'deuxi&egrave;me', 'troisi&egrave;me', 'quatri&egrave;me');
		$code .= "\t\t\t<li>{$position[$this->dernier_choix]} caract&egrave;re de ce code de validation</li>\n";

		return $code . "\t\t</ul>\n\t\t<p>Code <input type=\"text\" name=\"code\" style=\"width:100px;\" /></p>\n";
	}

	public function CodeOK($nom, $courriel, $objet, $message, $codeFourni)
	{
		$réponse = array($nom, $courriel, $objet, $message);
		$position = array(0, 1, -2, -1);	// position : premier, deuxième, avant dernier et dernier

		// construction du code à trouver issu des instructions.
		$code = '';
		for($i=0; $i<4; $i++)	$code .= substr($réponse[$this->T_id_champ[$i]] ,$position[$this->T_choix[$i]], 1); // i-ème instruction
		$code .= substr($code, $this->dernier_choix, 1); // dernier caractère

		return ($code == $codeFourni);
	}
}
