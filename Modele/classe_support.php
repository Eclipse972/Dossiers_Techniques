<?php
class Support {
private $id;
private $nom;
private $du;
private $le;
private $pti_nom;
private $dossier;
private $image;
private $zip;

public function __construct($id) { // constructeur
	global $_BD;
	$this->id = (int) $id;
	$ligne = $_BD->Support($this->id); // demande les données brutes à la BD sous forme de tableau associatif
	if ($ligne != null) { // la ligne est non vide
		$this->nom = $ligne['nom']);
		$this->setArticles($ligne['article_ID']);
		$this->setPti_nom($ligne['pti_nom']);
		$this->setDossier($ligne['dossier']);
		$this->setImage($ligne['image']);
		$this->setZip($ligne['zip']);
	} else $this = null;
}

// Assesseurs -------------------------------------------------------------------------------------
public function Le_support() { return $this->le.$this->nom; }
public function Du_support() { return $this->du.$this->nom; }
public function Image() { return $sthis->image; } // retourne le code HTML pour l'image du support

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
	if (preg_match('#^[a-zA-Z][a-zA-Z_0-9]+$#', $texte)) // commence par une lettre suivi d'autres lettres ou chiffre ou caratère _
			$this->pti_nom = $texte;
	else	trigger_error('Attention: '.$texte.' n&apos; pas un pti_nom valide pour '.$this->nom."\n", E_USER_WARNING);
}

private function setDossier($dossier) {
	if (!preg_match('#^[a-zA-Z][a-zA-Z_0-9]+$#', $dossier)) // commence par une lettre suivi d'autres lettres ou chiffre ou caratère _
		trigger_error('Attention: '.$dosier.' n&apos; pas un dossier valide pour '.$this->nom."\n", E_USER_WARNING);
	else {
		$dossier = 'Supports/'.$dossier.'/';
		if (file_exists($dossier))	$this->dossier = $dossier;
		else trigger_error('Attention: '.$dosier.' n&apos;existe pas pour '.$this->nom."\n", E_USER_WARNING);
	}
}

private function setImage($image) {
	$image = Image($image, $this->dossier.'images/'); // recherche l'image du support
	if ($image == 'Vue/images/pas2photo.png')
		trigger_error('Attention: pas d&apos;image pour '.$this->nom."\n", E_USER_WARNING);
	else {
		$this->image = '<img src="'.$images.'" alt="'.$this->Le_support()'">';
	}
}

private function setZip($archive) {
	$archive = Fichier($archive.'.zip', $this->dossier.'fichiers/'); // recherche l'archive
	$this->zip = ($archive == '#') ? null : $archive;
}

// Autres méthodes --------------------------------------------------------------------------------
public function A_propos() {
}
}
