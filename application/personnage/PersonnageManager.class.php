<?php
class PersonnageManager {
	private $_pdo;
	public function __construct($pdo) {
		$this->setPdo ( $pdo );
	}
	
	/* START ---- GETTER - SETTER */
	public function getPdo() {
		return $this->_pdo;
	}
	public function setPdo($newPdo) {
		$this->_pdo = $newPdo;
	}
	/* END ---- GETTER - SETTER */
	
	/* START ---- BUZINESS */
	public function addPersonnage($perso) {
		if (! $this->personnageExists ( $perso )) {
			$addPersonnageQuery = $this->getPdo ()->prepare ( 'INSERT INTO PERSONNAGES (NOM, EXPERIENCE, LOCALISATION, NIVEAU, FORCEPERSO, DEGATS ) VALUES (:nom, :experience, :localisation, :niveau, :forceperso, :degats)' );
			$addPersonnageQuery->bindValue ( ':nom', $perso->getNom () );
			$addPersonnageQuery->bindValue ( ':experience', $perso->getExperience () );
			$addPersonnageQuery->bindValue ( ':localisation', $perso->getLocalisation () );
			$addPersonnageQuery->bindValue ( ':niveau', $perso->getNiveau () );
			$addPersonnageQuery->bindValue ( ':forceperso', $perso->getForcePerso () );
			$addPersonnageQuery->bindValue ( ':degats', $perso->getDegats () );
			$addPersonnageQuery->execute ();
			$perso->hydrate ( array (
					'id' => $this->getPdo ()->lastInsertId () 
			) );
		}
	}
	public function deletePersonnageById($id) {
		$deletePersonnageQuery = $this->getPdo ()->prepare ( 'DELETE FROM PERSONNAGES WHERE ID=:id' );
		$deletePersonnageQuery->bindValue ( ':id', $id );
		$deletePersonnageQuery->execute ();
	}
	public function deletePersonnageByNom($nom) {
		$deletePersonnageQuery = $this->getPdo ()->prepare ( 'DELETE FROM PERSONNAGES WHERE NOM=:nom' );
		$deletePersonnageQuery->bindValue ( ':nom', $nom );
		$deletePersonnageQuery->execute ();
	}
	public function getPersonnageByNom($nom) {
		$getPersonnageNomQuery = $this->getPdo ()->prepare ( 'SELECT ID, NOM, EXPERIENCE, LOCALISATION, NIVEAU, FORCEPERSO, DEGATS FROM PERSONNAGES WHERE NOM=:nom' );
		$getPersonnageNomQuery->bindValue ( ':nom', $nom );
		$getPersonnageNomQuery->execute ();
		$perso = new Personnage ();
		$perso->hydrate ( $getPersonnageNomQuery->fetch ( PDO::FETCH_ASSOC ) );
		return $perso;
	}
	public function getAll() {
		$getAllQuery = $this->getPdo ()->prepare ( 'SELECT ID, NOM, EXPERIENCE, LOCALISATION, NIVEAU, FORCEPERSO, DEGATS FROM PERSONNAGES' );
		$getAllQuery->execute ();
		$allPersonnages = array ();
		foreach ( $getAllQuery->fetchAll ( PDO::FETCH_ASSOC ) as $row ) {
			$perso = new Personnage ();
			$perso->hydrate ( $row );
			$allPersonnages [] = $perso;
		}
		return $allPersonnages;
	}
	public function modifyPersonnageById($perso) {
		$modifyPersonnageQuery = $this->getPdo ()->prepare ( 'UPDATE PERSONNAGES SET NOM=:nom, EXPERIENCE=:experience, LOCALISATION=:localisation, NIVEAU=:niveau, FORCEPERSO=:forceperso, DEGATS=:degats WHERE ID=:id' );
		$modifyPersonnageQuery->bindValue ( ':nom', $perso->getNom () );
		$modifyPersonnageQuery->bindValue ( ':experience', $perso->getExperience () );
		$modifyPersonnageQuery->bindValue ( ':localisation', $perso->getLocalisation () );
		$modifyPersonnageQuery->bindValue ( ':niveau', $perso->getNiveau () );
		$modifyPersonnageQuery->bindValue ( ':forceperso', $perso->getForcePerso () );
		$modifyPersonnageQuery->bindValue ( ':degats', $perso->getDegats () );
		$modifyPersonnageQuery->bindValue ( ':id', $perso->getId () );
		$modifyPersonnageQuery->execute ();
	}
	public function modifyPersonnageByNom($perso) {
		$modifyPersonnageQuery = $this->getPdo ()->prepare ( 'UPDATE PERSONNAGES SET EXPERIENCE=:experience, LOCALISATION=:localisation, NIVEAU=:niveau, FORCEPERSO=:forceperso, DEGATS=:degats WHERE NOM=:nom' );
		$modifyPersonnageQuery->bindValue ( ':nom', $perso->getNom () );
		$modifyPersonnageQuery->bindValue ( ':experience', $perso->getExperience () );
		$modifyPersonnageQuery->bindValue ( ':localisation', $perso->getLocalisation () );
		$modifyPersonnageQuery->bindValue ( ':niveau', $perso->getNiveau () );
		$modifyPersonnageQuery->bindValue ( ':forceperso', $perso->getForcePerso () );
		$modifyPersonnageQuery->bindValue ( ':degats', $perso->getDegats () );
		$modifyPersonnageQuery->execute ();
	}
	public function personnageExists($perso) {
		$personnageExistsQuery = $this->getPdo ()->prepare ( 'SELECT NOM FROM PERSONNAGES WHERE NOM=:nom' );
		$personnageExistsQuery->bindValue ( ':nom', $perso->getNom () );
		$personnageExistsQuery->execute ();
		if ($personnageExistsQuery->fetch ( PDO::FETCH_ASSOC )) {
			return TRUE;
		}
		;
		return FALSE;
	}
	public function getPersonnageLikeNom($nom) {
		$getPersonnageNomQuery = $this->getPdo ()->prepare ( "SELECT ID, NOM, EXPERIENCE, LOCALISATION, NIVEAU, FORCEPERSO, DEGATS FROM PERSONNAGES WHERE NOM LIKE ':nom'" );
		$getPersonnageNomQuery->bindValue ( ':nom', '%' . $nom . '%' );
		$getPersonnageNomQuery->execute ();
		$allPersonnages = array ();
		foreach ( $getPersonnageNomQuery->fetchAll ( \PDO::FETCH_ASSOC ) as $row ) {
			$perso = new Personnage ();
			$perso->hydrate ( $row );
			$allPersonnages [] = $perso;
		}
		return $allPersonnages;
	}
	/* END ---- BUZINESS */
}

?>