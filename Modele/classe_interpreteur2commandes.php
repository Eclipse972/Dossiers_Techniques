<?php
class Interpreteur2commandes {	/*
Objectif: convertir un fichier de configuration compréhensible par un humain en une suite d'instructions pour un programme.

En entrée:
- fichier texte avec une instruction par ligne
- syntaxe d'une ligne: instruction<espace>liste de paramètres séparés par des virgules.
Comme le nombre de paramètre peut varier ils seront listé dans un tableau associatif indexé par un entier naturel.
Attention: le début de chaque ligne ne doit pas contenir d'espace mais peut contenir une tabulation.

En sortie
deux tableaux associatifs: instruction et paramètres. Comme une fonction ne peut renvoyer qu'une entité (qui peut être complexe), on renvoie un méta-tableau
construit à partir des tableaux instruction et paramètres. C'est à l'objet appelant l'interpréteur de se débrouiller avec ce méta tableau.
*/

var $liste_commandes;	// tableau associatif: nom de commande => nom de la fonction associée

function Interpreteur2commandes() {	// constructeur
	$this->liste_commandes = array(
	//	'commande'			=> 'fonction associée'  ATTENTION: la casse est importante pour la commande et la fonction. Pas d'espace ni de caractère accentué
		'articles'			=> 'Articles2',
		'dessin_densemble'	=> 'Dessin_densemble2',
		'eclate'			=> 'Eclate2',
		'item_menu'			=> 'Item_menu2',
		'item_sous_menu'	=> 'Item_sous_menu2',
		'piece'				=> 'Piece2',
		'CE'				=> 'Classe_equivalence2'
	);
}
function Decode($fichier, $trace = false) {
	if(file_exists($fichier)) {
	    $lignes = file($fichier);
	    $tampon = 'Fichier de configuration ouvert avec succès'."\n";
	    $num_ligne = 0; // numéro de la ligne de code actuelle qui est peut être différente du numéro de ligne du fichier de configuration. instruction erroné, saut de ligne ou commentaire
	    foreach ($lignes as $num => $ligne) {
    		list($instruction, $parametres) = explode(" ", $ligne, 2);
    		$instruction = trim($instruction,	" \t\n\r\0\x0B");	// permet de supprimer certains caractère spéciaux au début et en fin de chaîne de caractères
			if(isset($this->liste_commandes[$instruction])) {		// si l'instruction existe alors on cherche les paramètres
				$code[$num_ligne]['instruction'] = $this->liste_commandes[$instruction];	// le nom de la fonction à appeler
				$parametres = explode(",", $parametres);	// liste des paramètres dans un tableau
				foreach ($parametres as $i => $valeur)		// nettoyage de chaque paramètre
					$parametres[$i] = trim($valeur,	" \t\n\r\0\x0B" );

				$code[$num_ligne]['parametres'] = $parametres;
				$num_ligne++;
			}
			elseif($instruction != '' && $instruction != '//')	// si l'instruction n'est pas vide et n'est pas un commentaire
				$tampon .= "Erreur en ligne '$num' : '$ligne'\n";
		}
    }
    else {
    	$tampon = 'Fichier '.$fichier." inexistant\n";
    	$code = false;
    }

    if($trace)	// si on demande une trace du processus
    	echo "<!-- Trace de l'interpréteur de commande\n$tampon\n--!>\n";
	return $code;
}

}