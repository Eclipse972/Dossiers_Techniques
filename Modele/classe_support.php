<?php
class Support {
var $nom;		// nom complet
var $pti_nom;	// nom raccourci utilisable comme nom de fichier (pas de caractère accentué, ni d'espace, ...)
var $image;
var $dossier;
// variables définies dans le fichier de configuration
var $du;
var $le;
var $menu;
var $sous_menu;
var $item_menu_courant;	// variable servant lors de la création du sous-menu

var $association; 	// image fichier
var $nomenclature;	// tableau contenant la liste des pièces/sous-ensemble

function Support($nom, $pti_nom, $dossier) {	// constructeur
	$this->nom		= $nom;
	$this->pti_nom	= $pti_nom;
	$this->image	= $pti_nom.'.png';
	$this->dossier	= 'Supports/'.$dossier.'/';

	// les variables suivantes seront définies grâce au fichier de configuration
	$this->du = 'du '; // valeurs par défaut si on oublie de les indiquer dans le fichier de configuration.
	$this->le = 'le ';

	// le menu
	$this->menu['MES']		= 'Mise en situation';
	$this->sous_menu		= array();
	$this->item_menu_courant= 'MES';

	// tableaux associatifs
	$this->association	= array(); // tableau contenant dessin d'ensemble, éclaté, etc...
	$this->nomenclature	= array(); // tableau contenant la liste des pièces
}

function Configuration() {	// charge le fichier de configuration pour terminer la création du support
	require $this->dossier.'configuration.php';
}

function Créer_association($type, $fichier, $extension, $titre) {		// rajoute une association image-fichier dans le tableau association
	// L'image et le fichier portent le même nom mais avec une extension différente
	switch($extension) {	// détermination du commentaire suivant l'extension du fichier edrawing
	case '.EASM':	// assemblage
		$commentaire = 'Une fois le fichier assemblage ouvert, cliquez sur<img src="Vue/icone_eclater_rassembler.png" class="icone" alt="Ic&ocirc;ne &eacute;clater/Rassembler de eDrawing">pour basculer entre les vues assemblée et éclatée.';
		break;
	case '.EPRT':	// pièce
		$commentaire = 'Une fois le fichier pi&egrave;ce ouvert, vous pourrez le manipuler';
		break;
	case '.EDRW':	// dessin
		$commentaire = 'Une fois le fichier mise en plan ouvert, vous pourrez zoomer, changer le style d&#145;affichage, ...';
		break;
	default:			// extension inconnue => aucun commentaire
		$commentaire = '';
	}
	// ajout de l'association dans le tableau
	$this->association[$type] = new Association_image_fichier($this->dossier, $fichier, $extension, $titre, $commentaire);
}

function Code($type) {		// renvoie le code HTML d'une des association du support
	if(isset($this->association[$type])) {		// si le type d'association existe
			$association = $this->association[$type];
			return $association->Page();	// on renvoie le code HTML de la page correspondant à l'association
	}
	else	return "Page inexistante\n";
}

/****************************************************************************************************************************************
	Fonctions de création à utiliser dans le fichier de configuration.
	L'objectif est d'employer un vocabulaire humainement compréhensible
****************************************************************************************************************************************/
function Créer_articles($du = 'du ', $le = 'le ') {
	$this->du = $du;
	$this->le = $le;
}
function Creer_articles2($parametres) {
	if(isset($parametres[0]))
			$this->du = $parametres[0];
	else	$this->du = 'du ';
	if(isset($parametres[1]))
			$this->le = $parametres[1];
	else	$this->du = 'le ';
}

function Ajouter_item_menu($fichier, $texte) {
	$this->menu[$fichier]	= $texte;
	$this->item_menu_courant= $fichier;
}
function Ajouter_item_menu2($parametres) {
	list($fichier, $texte) = $parametres;
	$this->menu[$fichier] = $texte;
	$this->item_menu_courant = $fichier;
}

function Ajouter_item_sous_menu($fichier, $texte) {
	$this->sous_menu[$this->item_menu_courant][$fichier] = $texte;
}
function Ajouter_item_sous_menu2($parametres)	{
	list($fichier, $texte) = $parametres;
	$this->sous_menu[$this->item_menu_courant][$fichier] = $texte;
}

function Créer_dessin_densemble($nom = null) {
	if(!isset($nom))				// si le nom du fichier n'est pas défini
		$nom = 'dessin_'.$this->pti_nom;	// le nom par défaut est dessin_pti_nom du support
	$this->Créer_association('dessin_densemble', $nom, '.EDRW', 'Dessin d&#145;ensemble');
}
function Creer_dessin_densemble2($parametres) {
	$nom = $parametres[0];
	if(!isset($nom))				// si le nom du fichier n'est pas défini
		$nom = 'dessin_'.$this->pti_nom;	// le nom par défaut est dessin_pti_nom du support
	$this->Créer_association('dessin_densemble', $nom, '.EDRW', 'Dessin d&#145;ensemble');
}

function Créer_éclaté($nom = null) {
	if(!isset($nom))			// si le nom du fichier n'est pas défini
		$nom = $this->pti_nom;	// le nom par défaut est pti_nom du du support
	$this->Créer_association('eclate', $nom, '.EASM', '&Eacute;clat&eacute;');
}
function Creer_eclate2($parametres)	{
	$nom = $parametres[0];
	if(!isset($nom))			// si le nom du fichier n'est pas défini
		$nom = $this->pti_nom;	// le nom par défaut est pti_nom du du support
	$this->Créer_association('eclate', $nom, '.EASM', '&Eacute;clat&eacute;');
}

function Ajouter_CE($type, $fichier, $titre, $extension ='.EASM') {
/* Ajoute une classe d'équivalence dans le tableau des associations
	cette fonction a pour unique but de rendre le fichier de configuration lisible
	Attention à l'ordre des paramètres est différent. Ici l'extension est en dernier et est un assemblage par défaut.
	Si la CE se limite à une pièce il faut ajouter l'extension .EPRT comme dernier paramètre.
*/
	$this->Créer_association($type, $fichier, $extension, 'Classe d&#145;&eacute;quivalence: '.$titre);
}

// fonctions pour ajouter une pièce ou un sous ensemble à la nomenclature
function Ajouter_pièce($repere, $nom, $image, $quantite = 1, $matiere = null, $observation = null) {
	$this->nomenclature[$repere] = new Piece($nom, $this->dossier, $image, $quantite, $matiere, $observation);
}

function Ajouter_sous_ensemble($repere, $nom, $image, $quantite = 1, $observation = null) {
	$this->nomenclature[$repere] = new Piece($nom, $this->dossier, $image, $quantite, '', $observation, '.EASM');
}
}
