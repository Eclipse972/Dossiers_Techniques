<?php
class Support {
private $id;
private $nom;
private $pti_nom;
private $dossier;
private $image;
private $zip;

public function __construct($id) { // constructeur
	$T_du = ['du ', 'de la ',	'de l&apos;'];
	$T_le = ['le ', 'la ',		'l&apos;'];
	
	if ($ligne != null) { // la ligne est non vide
		$this->id		= $id;
		$this->pti_nom	= $ligne['pti_nom'];
		$this->dossier	= 'Supports/'.$ligne['dossier'].'/';
		$this->image	= '<img src="'.$this->dossier.'images/'.$this->pti_nom.'.png" alt="'.$T_le[$ligne['article_ID']-1].$ligne['nom'].'">';
		$this->du		= $T_du[$ligne['article_ID']-1].$ligne['nom'];
		$this->zip		= $ligne['zip'].'.zip'
	} else $this = null;
	$this->Fermer();
}

}
