<?php

class Database {
	
	private $mysqli;
	private $error;
	private $errormessage;
	
	public function __construct() {
		$this->mysqli = new mysqli(_DB_HOST, _DB_USER, _DB_PASSWORD, _DB_DATABASE);
		
		if ($this->mysqli->connect_errno) {
			$this->error = true;
			$this->errormessage = "Connect failed: ".$this->mysqli->connect_error;
		}
	}
	
	public function getMysqli() {
		if (!$this->error) {
			return $this->mysqli;
		}
		return null;
	}
	
	public function hasError() {
		return $this->error;
	}
	
	public function getErrorMessage() {
		return $this->errormessage;
	}
	
}