<?php
require_once 'Ancestor.class.php';
class Addresses extends Ancestor {
	private $_addresstype;
	private $_num;
	private $_street;
	private $_pc;
	private $_city;
	private $_idcustomer;
	public function __construct() {
	}
	public function getAddresstype() {
		return $this->_addresstype;
	}
	public function getNum() {
		return $this->_num;
	}
	public function getStreet() {
		return $this->_street;
	}
	public function getPc() {
		return $this->_pc;
	}
	public function getCity() {
		return $this->_city;
	}
	public function getIdcustomer() {
		return $this->_idcustomer;
	}
	public function setAddresstype($newValue) {
		$this->_addresstype = $newValue;
	}
	public function setNum($newValue) {
		$this->_num = $newValue;
	}
	public function setStreet($newValue) {
		$this->_street = $newValue;
	}
	public function setPc($newValue) {
		$this->_pc = $newValue;
	}
	public function setCity($newValue) {
		$this->_city = $newValue;
	}
	public function setIdcustomer($newValue) {
		$this->_idcustomer = $newValue;
	}
	function hydrate($donnees) {
		Parent::hydrate ( $donnees );
	}
}

?>