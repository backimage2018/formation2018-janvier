<?php
class Personnage {
	private $_id;
	private $_forcePerso; // la force du personnage, utilisée pour le calcul des dégâts
	private $_degats; // la quantité de dégats subits, modifié par la force
	private $_localisation; // l'endroit ou se trouve le personnage
	private $_experience; // l'expérience du personnage, on gagne 1 pt d'expérience pour 5 pts de dégats infligés
	private $_nom;
	private $_niveau;
	const FORCE_GRANDE = 30;
	const FORCE_MOYENNE = 20;
	const FORCE_PETITE = 10;
	/* START - STATIC */
	private static $_compteur = 0;
	public static function getCompteur() {
		return self::$_compteur;
	}
	/* END - STATIC */
	/* START - CONSTRUCTOR */
	/*
	 * public function __construct($id, $for, $dgts, $loc, $xp, $nom, $niveau) {
	 * $this->setId ( $i
	 * d );
	 * $this->setForce ( $for );
	 * $this->setDegats ( $dgts );
	 * $this->setLocalisation ( $loc );
	 * $this->setExperience ( $xp );
	 * $this->setNom ( $nom );
	 * $this->setNiveau ( $niveau );
	 *
	 * self::$_compteur ++;
	 * }
	 */
	public function __construct() {
		self::$_compteur ++;
	}
	
	/* END - CONSTRUCTOR */
	
	/* START - BUZINESS METHODS */
	
	/**
	 * Permet à un personnage de frapper un autre personnage
	 *
	 * @param Personnage $personnage
	 *        	le personnage frappé
	 * @param int $nombreDeFois
	 *        	le nombre de fois que $personnage est frappé
	 */
	function taper($personnage, $nombreDeFois) {
		$degatsAvantLeCoup = $personnage->getDegats ();
		
		for($i = 0; $i < $nombreDeFois; $i ++) {
			$personnage->setDegats ( $personnage->getDegats () + $this->getForce () ); // frappe un personne en fonction de sa force
		}
		
		$degatsApresLeCoup = $personnage->getDegats ();
		
		$nbrXp = ($degatsApresLeCoup - $degatsAvantLeCoup) / 5;
		
		for($i = 0; $i < $nbrXp; $i ++) {
			$this->gagnerExperience ();
		}
	}
	/**
	 * Déplace la localisation du personnage à la localisation passée en paramètre
	 *
	 * @param unknown $newLocation
	 *        	la nouvelle localisation
	 */
	function deplacer($newLocation) {
		$this->setLocalisation ( $newLocation ); // change la localisation par celle passée en paramètre
	}
	/**
	 * Permet au personnage de gagner de l'expérience
	 * 1pt d'expérience pour 5 points de dégats infligés
	 */
	function gagnerExperience() {
		$this->setExperience ( $this->getExperience () + 1 ); // augmente $_experience de 1 lorsqu'il frappe
	}
	
	/**
	 * Affiche à l'écran la phrase 'Je suis un personnage'
	 */
	function parler() {
		echo 'Je suis un personnage';
	}
	/* END - BUZINESS METHODS */
	
	/* START - GETTERS */
	/**
	 * Renvoie la valeur de la variable force
	 *
	 * @return int
	 */
	function getForcePerso() {
		return $this->_forcePerso;
	}
	/**
	 * Renvoie la valeur de la variable degats
	 *
	 * @return int
	 */
	function getDegats() {
		return $this->_degats;
	}
	/**
	 * Renvoie la valeur de la variable localisation
	 *
	 * @return string
	 */
	function getLocalisation() {
		return $this->_localisation;
	}
	/**
	 * Renvoie la valeur de la variable expérience
	 *
	 * @return int
	 */
	function getExperience() {
		return $this->_experience;
	}
	/**
	 * Renvoie la valeur de la variable nom
	 *
	 * @return string
	 */
	function getNom() {
		return $this->_nom;
	}
	/**
	 * Renvoie la valeur de la variable niveau
	 *
	 * @return int
	 */
	function getNiveau() {
		return $this->_niveau;
	}
	/**
	 * Renvoie la valeur de la variable id
	 *
	 * @return int
	 */
	function getId() {
		return $this->_id;
	}
	/* END - GETTERS */
	/* START - SETTERS */
	/**
	 * Assigne la valeur passée en paramètre à la variable force
	 * La valeur passée en paramètre doit être remplie et du bon type sinon la fonction renvoie une erreur
	 *
	 * @param int $newForce        	
	 */
	function setForcePerso($newForce) {
		if (isset ( $newForce )) {
			if (in_array ( $newForce, array (
					self::FORCE_GRANDE,
					self::FORCE_MOYENNE,
					self::FORCE_PETITE 
			) )) {
				$this->_forcePerso = ( int ) $newForce;
			} else {
				trigger_error ( 'La valeur assignée à la force doit être une valeur correspondant à une constante existante' );
			}
		} else {
			trigger_error ( 'Aucune valeur à assigner pour la force, valeur non définie' );
		}
	}
	/**
	 * Assigne la valeur passée en paramètre à la variable dégats
	 * La valeur passée en paramètre doit être remplie et du bon type sinon la fonction renvoie une erreur
	 *
	 * @param int $newDegats        	
	 */
	function setDegats($newDegats) {
		if (isset ( $newDegats )) {
			$this->_degats = ( int ) $newDegats;
		} else {
			trigger_error ( 'Aucune valeur à assigner pour les dégâts, valeur non définie' );
		}
	}
	/**
	 * Assigne la valeur passée en paramètre à la variable localisation
	 * La valeur passée en paramètre doit être remplie et du bon type sinon la fonction renvoie une erreur
	 *
	 * @param string $newLoc        	
	 */
	function setLocalisation($newLoc) {
		if (isset ( $newLoc )) {
			$this->_localisation = $newLoc;
		} else {
			trigger_error ( 'Aucune valeur à assigner pour la localisation, valeur non définie' );
		}
	}
	/**
	 * Assigne la valeur passée en paramètre à la variable expérience
	 * La valeur passée en paramètre doit être remplie et du bon type sinon la fonction renvoie une erreur
	 *
	 * @param int $newXp        	
	 */
	function setExperience($newXp) {
		if (isset ( $newXp )) {
			$this->_experience = ( int ) $newXp;
		} else {
			trigger_error ( 'Aucune valeur à assigner pour l\'expérience, valeur non définie' );
		}
	}
	/**
	 * Assigne la valeur passée en paramètre à la variable nom
	 * La valeur passée en paramètre doit être remplie et du bon type sinon la fonction renvoie une erreur
	 *
	 * @param string $nom        	
	 */
	function setNom($nom) {
		if (isset ( $nom )) {
			$this->_nom = $nom;
		} else {
			trigger_error ( 'Aucune valeur à assigner pour le nom, valeur non définie' );
		}
	}
	/**
	 * Assigne la valeur passée en paramètre à la variable niveau
	 * La valeur passée en paramètre doit être remplie et du bon type sinon la fonction renvoie une erreur
	 *
	 * @param int $niveau        	
	 */
	function setNiveau($niveau) {
		if (isset ( $niveau )) {
			$this->_niveau = ( int ) $niveau;
		} else {
			trigger_error ( 'Aucune valeur à assigner pour le niveau, valeur non définie' );
		}
	}
	function setId($id) {
		if (isset ( $id )) {
			$this->_id = ( int ) $id;
		} else {
			trigger_error ( 'Aucune valeur à assigner pour l\'id, valeur non définie' );
		}
	}
	/* END - SETTERS */
	function hydrate($donnees) {
		foreach ( $donnees as $key => $value ) {
			$methodName = 'set' . ucfirst ( $key );
			
			if (method_exists ( $this, $methodName )) {
				$this->$methodName ( $value );
			}
		}
	}
}
?>
