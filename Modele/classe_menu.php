<?php
class Menu {
	private $ID_support;
	private $item;
	private $sous_item;
	/// la clase BD est nécessaire

	public function __construct() {	// constructeur pour le support actuel
		$this->ID_support	= $_SESSION['support']->Id();		// le support doit être validé en amont
		$this->item			= $_SESSION['support']->Item();		// item sélectionné
		$this->sous_item	= $_SESSION['support']->Sous_item();// sous_item sélectionné
	}

	public function Afficher() {
		$BD = new base2donnees();
		$T_items = $BD->Liste_item($this->ID_support, $this->item);
		if(isset($T_items)) {
			echo "<ul>\n";
			foreach($T_items as $i => $item) {	// affichage du menu
				echo "<li>$item</li>\n";	// lien
				// si item courant = item sélectionné et sous-menu existe alors affichage du sous-menu
				$T_sous_items = $BD->Liste_sous_item($this->ID_support, $this->item, $this->sous_item);
				if (($i == $this->item) && isset($T_sous_items)) {
					echo "\t<ul>\n";
					foreach($T_sous_items as $sous_item)	echo "\t<li>$sous_item</li>\n";
					echo "\t</ul>\n";
				}
			}
			echo "</ul>\n<a href=index.php>SOMMAIRE</a>\n";
		} else trigger_error('Menu inexsistant: identifiant du support='.$this->ID_support."\n". E_USER_WARNING);
	}
}
