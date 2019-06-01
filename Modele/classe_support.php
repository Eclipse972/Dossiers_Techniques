<?php
class Support {
private $id;
private $item;		// item actuel
private $sous_item;	// sous-item actuel
private $nom;
private $du;
private $le;
private $pti_nom; /* C'est le nom par défaut de certains fichiers.
le dessin d'ensemble.Ex dessin_cric
la maquette numérique: cric.EASM
l'image du support: cric.png
l'archive zip de la maquette: cric.zip
*/
private $dossier;
private $image;
private $zip;
// les classes BD, Menu et Fichier sont nécessaires

public function __construct($id) { // Il faut vérifier avant que le support existe
$this->id = (int) $id;
$BD = new base2donnees();
$ligne = $BD->Support($this->id); // demande les données brutes à la BD sous forme de tableau associatif
if ($ligne != null) { // la ligne est non vide
	$this->nom = $ligne['nom'];
	$this->setArticles($ligne['article_ID']);
	$this->setPti_nom($ligne['pti_nom']);
	$this->setDossier($ligne['dossier']);
	$this->setImage($ligne['pti_nom']);
	$this->setZip($ligne['zip']);
}
}

// Assesseurs -------------------------------------------------------------------------------------
public function ID()			{ return $this->id; }

public function Item()			{ return $this->item; }

public function Sous_item()		{ return $this->sous_item; }

public function Nom()			{ return $this->nom; }

public function Pti_nom()		{ return $this->pti_nom; }

public function Dossier()		{ return $this->dossier; }

public function Le_support()	{ return $this->le.$this->nom; }

public function Du_support()	{ return $this->du.$this->nom; }

public function Image()			{ return $this->image; } // retourne le code HTML pour l'image du support

// Mutateurs --------------------------------------------------------------------------------------
private function setArticles($i) {
$i = (int) $i;
switch ($i) {
case 2:
	$this->du = 'de la ';
	$this->le = 'la ';
	break;
case 3:
	$this->du = 'de l&apos;';
	$this->le = 'l&apos;';
	break;
default:
	$this->du = 'du ';
	$this->le = 'le ';
}
}

private function setPti_nom($texte) {
// Le pti nom commence par une lettre suivi d'autres lettres ou chiffre ou tiret ou underscore
if (preg_match('#^[a-zA-Z][a-zA-Z_0-9_-]+$#', $texte))
		$this->pti_nom = $texte;
else	trigger_error('Attention: '.$texte.' n&apos; pas un pti_nom valide pour '.$this->nom."\n", E_USER_WARNING);
}

private function setDossier($dossier) {
// le nom du dossier commence par une lettre suivi d'autres lettres ou chiffre ou tiret ou underscore _
if (!preg_match('#^[a-zA-Z][a-zA-Z_0-9_-]+$#', $dossier))
	trigger_error('Attention: '.$dossier.' n&apos; pas un dossier valide pour '.$this->nom."\n", E_USER_WARNING);
else { // suivant le script qui se sert de la classe il faut donner un préfix pour accéder au bon dossier
	$dossier = 'Supports/'.$dossier.'/';
	if (file_exists($dossier))	$this->dossier = $dossier;
	else trigger_error('Attention: '.$dossier.' n&apos;existe pas pour '.$this->Le_support()."\n", E_USER_WARNING);
}
}

private function setImage($image) {	
$image = new Image($image, $this->dossier.'images/'); // recherche l'image du support
if ($image->Existe())
	$this->image = $image->Balise($this->Le_support());
else
	trigger_error('Attention: pas d&apos;image pour '.$this->Le_support()."\n", E_USER_WARNING);
}

private function setZip($archive) {
$archive = new Zip($archive, $this->dossier); // recherche l'archive du support
$this->zip = ($archive->Existe()) ? $archive : null;
}

public function setPosition($item, $sous_item) {
$BD = new base2donnees();
if (($BD->Page_existe($this->id, $item, $sous_item)) || ($item == 0)) {
	$this->item	 = $item; // on stocke dans le support
	$this->sous_item = $sous_item;
} else { 
	$this->item	 = 1; // on utilise la page mise en situation
	$this->sous_item = 0;
}
}

// Autres méthodes --------------------------------------------------------------------------------
public function Nomenclature() {
	$BD = new base2donnees();
	return $BD->Nomenclature($this->id);
}

public function Script() { // renvoi le script à exécuter
$BD = new base2donnees();
$script = $BD->Script($this->id, $this->item, $this->sous_item);
// détermination du script à inclure
if (file_exists($this->dossier.$script)) // si le script dans le dossier du support existe
	return $this->dossier.$script;
elseif (file_exists('Vue/mots-cles/'.$script)) // sinon c'est un mot clé
	return'Vue/mots-cles/'.$script;
else
	return 'Vue/oups.php'; // si le script n'existe nulle part ...
}

public function Parametres_script() { // renvoi la liste des paramètres du script à exécuter
$BD = new base2donnees();
return $BD->Parametres_script($this->id, $this->item, $this->sous_item);
}
}
