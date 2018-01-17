<?php
class portefeuille {
	public $monnaie = 10;
	function __construct() {
		$monnaie = 6;
		echo 'je suis une instance d\'un ' . get_class ( $this );
		echo '<br/>';
		echo '$this->monnaie : je suis $this->monnaie déclaré au niveau de la classe ' . $this->monnaie;
		echo '<br/>';
		echo '$monnaie : je suis $monnaie déclarée dans la fonction __construct ' . $monnaie;
		// echo '<br/>';
		echo '<br/>';
		$this->unefonction ();
	}
	function unefonction() {
		echo '$monnaie : je cherche à afficher la valeur de $monnaie ';
		echo $monnaie;
		echo '<br/>';
		echo 'mais j\'ai une erreur car une variable déclarée dans une fonction n\'est accessible que dans cette fonction';
		echo '<br/>';
		echo 'déclarons une variable $monnaie dans cette fonction';
		$monnaie = 4;
		echo '$monnaie : je suis $monnaie déclarée dans la fonction unefonction() ' . $monnaie;
		echo '<br/>';
		echo '$this->monnaie : je suis $this->monnaie déclaré au niveau de la classe ' . $this->monnaie;
		echo '<br/>';
	}
}
new portefeuille ();
?>