<?php
class Support {
private $id;
private $item;		// item actuel
private $sous_item;	// sous-item actuel
private $nom;
private $du;
private $le;
private $pti_nom;
private $dossier;
private $image;
private $zip;

public function __construct($id) { // Il faut vérifier avant que le support existe
	global $_BD;
	$this->id = (int) $id;
	$ligne = $_BD->Support($this->id); // demande les données brutes à la BD sous forme de tableau associatif
	if ($ligne != null) { // la ligne est non vide
		$this->nom = $ligne['nom'];
		$this->setArticles($ligne['article_ID']);
		$this->setPti_nom($ligne['pti_nom']);
		$this->setDossier($ligne['dossier']);
		$this->setImage($ligne['image']);
		$this->setZip($ligne['zip']);
	}
}

// Assesseurs -------------------------------------------------------------------------------------
public function Le_support() {
	return $this->le.$this->nom;
}
public function Du_support() {
	return $this->du.$this->nom;
}
public function Image() { // retourne le code HTML pour l'image du support
	return $sthis->image;
}

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
		$this->image = '<img src="'.$images.'" alt="'.$this->Le_support().'">';
	}
}

private function setZip($archive) {
	$archive = Fichier($archive.'.zip', $this->dossier.'fichiers/'); // recherche l'archive
	$this->zip = ($archive == '#') ? null : $archive;
}

public function setPosition($item, $sous_item) {
	global $_BD;
	if ($_BD->Page_existe($this->id, $item, $sous_item)) {
		$this->item	 = $item; // on stocke dans le support
		$this->sous_item = $sous_item;
	} else{ 
		$this->item	 = 1; // on utilise la page mise en situation
		$this->sous_item = 0;
	}
}

// Autres méthodes --------------------------------------------------------------------------------
public function A_propos() { // le support crée le code mais ce n'est pas son rôle de l'afficher
	global $_BD;
	if (isset($this->zip))
		$code = '<p>D&eacute;sol&eacute;! l&apos;archive n&apos;est pas encore disponible</p>';
	else {
		$code = '<a href="'.$this->zip.'">Cliquez ici pour t&eacute;l&eacute;charger l&apos;archive ZIP de la maquette numérique</a>'."\n".
				'<p><u><b>Informations sur la maquette num&eacute;rique</b></u></p>'."\n";
		$Liste = $_BD->Description_maquette($this->id);
		switch(count($Liste)) {
		case 0:
			$code .= '<p>la maquette comporte une configuration &eacute;clat&eacute; et le dessin d&apos;ensemble</p>';
			break;
		case 1:
			$code .= '<p>'.$Liste[0].'</p>';
			break;
		default:
			$code .= '<ul>'."\n";
			foreach ($Liste as $texte)	$code .= '<li>'.$texte.'</li>'."\n";
			$code .= '</ul>';
		}
	}
	$code .= "\n".'<p><u><b>Liens (dans un nouvel onglet)</b></u></p>';
	$Liste = $_BD->Lien_support($this->id);
	switch(count($Liste)) {
	case 0:
		$code .= '<p>Aucun pour le moment</p>';
		break;
	case 1:
		$code .= '<p>'.$Liste[0].'</p>';
		break;
	default:
		$code .= '<ul>'."\n";
		foreach ($Liste as $lien)
			$code .= '<li>'.$lien.'</li>'."\n";
		$code .= '</ul>';
	}
	$code .= "\n".Lien('Retour au dossier technique '.$this>Du_support(), $this->id);
	return $code;
}

public function Generer_menu() { // le support crée le code mais ce n'est pas son rôle de l'afficher
	$menu = new Menu($this->id, $this->item, $this->sous_item); // création du menu
	return $menu->Code();
}

public function Script(&$erreur) { // renvoi  le script à exécuter
	global $_BD;
	$script = $_BD->Script($this->id, $this->item, $this->sous_item);
	$erreur = false;
	// détermination du script à inclure
	if (file_exists($this->dossier.$script)) // si le script dans le dossier du support existe
		return $this->dossier.$script;
	elseif (file_exists('Vue/'.$script)) // sinon c'est un mot clé
		return'Vue/'.$script;
	else {
		$erreur = true;
		return 'Vue/oups.php'; // si le script n'existe nulle part ...
	}
}
}
