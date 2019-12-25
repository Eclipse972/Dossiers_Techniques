<?php
class Support {
private $id;
private $item;		// item actuel
private $sous_item;	// sous-item actuel
private $nom;
private $du_support;
private $le_support;
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
	$this->le_support = $ligne['le_support'];
	$this->du_support = $ligne['du_support'];
	$this->setDossier($ligne['dossier']);
	$this->setZip($ligne['zip']);
	$this->setImage($ligne['image']);
	$this->setPti_nom($ligne['pti_nom']);
}
}

// Assesseurs -------------------------------------------------------------------------------------
public function ID()			{ return $this->id; }

public function Item()			{ return $this->item; }

public function Sous_item()		{ return $this->sous_item; }

public function Nom()			{ return $this->nom; }

public function Pti_nom()		{ return $this->pti_nom; }

public function Dossier()		{ return $this->dossier; }

public function Le_support()	{ return $this->le_support; }

public function Du_support()	{ return $this->du_support; }

public function Image()			{ return $this->image; } // retourne le code HTML pour l'image du support

public function Zip_existe()	{ return isset($this->zip); }

public function Zip()			{ return $this->zip->Lien('Cliquez ici pour t&eacute;l&eacute;charger l&apos;archive ZIP de la maquette num&eacute;rique'); }

// Mutateurs --------------------------------------------------------------------------------------
private function setPti_nom($texte) {
// Le pti nom commence par une lettre suivi d'autres lettres ou chiffre ou tiret ou underscore
if (preg_match('#^[a-zA-Z][a-zA-Z_0-9_-]+$#', $texte))
		$this->pti_nom = $texte;
else	trigger_error('Attention: '.$texte.' n&apos; pas un pti_nom valide pour '.$this->nom."\n", E_USER_ERROR);
}

private function setDossier($dossier) {
// le nom du dossier commence par une lettre suivi d'autres lettres ou chiffre ou tiret ou underscore _
if (!preg_match('#^Supports/[a-zA-Z][a-zA-Z_0-9_-]+/$#', $dossier)) // de la forme Supports/dossier/
	trigger_error('Attention: le nom de dossier '.$this->du_support.' n&apos; pas valide'."\n", E_USER_ERROR);
else
	if (file_exists($dossier))	$this->dossier = $dossier;
	else trigger_error('Attention: le dossier'.$this->du_support.' n&apos;existe'."\n", E_USER_ERROR);
}

private function setImage($image) {	
$image = new Image($image); // recherche l'image du support
if ($image->Existe())
	$this->image = $image->Balise($this->Le_support());
else
	trigger_error('Attention: pas d&apos;image pour '.$this->Le_support()."\n", E_USER_ERROR);
}

private function setZip($zip) {
$archive = new Zip($zip); // recherche l'archive du support
$this->zip = ($archive->Existe()) ? $archive : null;
}

public function setPosition($item, $sous_item) {
$BD = new base2donnees();
if ($BD->Page_existe($this->id, $item, $sous_item)) {
	$this->item	 = $item; // on stocke dans le support
	$this->sous_item = $sous_item;
} else { 
	$this->item	 = 1; // on utilise la page mise en situation
	$this->sous_item = 0;
}
}
}
