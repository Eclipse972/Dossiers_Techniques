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
public function A_propos() { // le support crée le code mais ce n'est pas son rôle de l'afficher
$BD = new base2donnees();
$code = '<p><u><b>Informations sur la maquette num&eacute;rique</b></u></p>'."\n";
if (isset($this->zip)) {
	$code .= $this->zip->Lien('Cliquez ici pour t&eacute;l&eacute;charger l&apos;archive ZIP de la maquette num&eacute;rique')."\n";
	$Liste = $BD->Description_maquette($this->id);
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
} else $code .= '<p>D&eacute;sol&eacute;! l&apos;archive n&apos;est pas encore disponible</p>';
$code .= "\n".'<p><u><b>Liens (dans un nouvel onglet)</b></u></p>';
$Liste = $BD->Lien_support($this->id);
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
return $code."\n";
}

public function Generer_menu() { // le support crée le code mais ce n'est pas son rôle de l'afficher
$menu = new Menu($this->id, $this->item, $this->sous_item); // création du menu
return $menu->Code();
}

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

public function Insérer_image($image, $alt, $supplement = '') { // affiche une image du support courant.
$image = new Image($image, $this->dossier.'images/');
echo '<img src="', $image->Chemin(),'" '.$supplement.' alt="', $alt, '">',"\n";
									// class et/ou style
}

public function Générer_page_image($T, $dessus = false) {
// T est un tableau contenant 4 paramètres: titre image texte et hauteur
$image = new Image($T['param2'], $this->dossier.'images/');
/* Remarques
par défaut le texte est un paragraphe
mettre plusieurs paragraphes comme ceci: parag1</p><p>parag2</p><p>parag3
mettre du code html: </p>code html<p>. les balises qui entourent le code vont créé 2 paragraphes vides
								titre			texte*/
return $image->Page_image($T['param1'], '<p>'.$T['param3'].'</p>'."\n", $T['param1'], $dessus, $T['param4']);
}
}
