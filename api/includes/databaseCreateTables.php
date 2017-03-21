<?php

class CreateTables {
	
	function __construct() {
		/*
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."translations (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name varchar(255) NOT NULL,
				language ENUM('EN', 'NL') NOT NULL DEFAULT 'EN',
				translation TINYTEXT NOT NULL,
				timestamp TIMESTAMP
			)
		");
		*/
	}
	
	private function create($sql) {
		APP::getMysqli()->query($sql);
	}
	
}