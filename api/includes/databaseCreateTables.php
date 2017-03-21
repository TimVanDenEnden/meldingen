<?php

class CreateTables {
	
	function __construct() {
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."locations (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				category_id INT NOT NULL,
				building TINYTEXT NOT NULL,
				description MEDIUMTEXT NOT NULL,
				timestamp TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."location_category (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				timestamp TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."category (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				description MEDIUMTEXT NOT NULL,
				timestamp TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."weapons (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				timestamp TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."drugsactions (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				timestamp TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."contacts (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				phonenumber TINYTEXT NOT NULL,
				emailadress TINYTEXT NOT NULL,
				timestamp TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."vehicletypes (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				timestamp TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."vehicles (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				brand TINYTEXT NOT NULL,
				numberplate TINYTEXT NOT NULL,
				color TINYTEXT NOT NULL,
				additionalsfeatures TINYTEXT NOT NULL,
				vehicletype_id INT NOT NULL,
				report_id INT NOT NULL,
				timestamp TIMESTAMP
			)
		");
		
		/*
			sex:
				0: onbekend
				1: man
				2: vrouw
				
			skincolor:
				0: blank
				1: licht getint
				2: donker
		*/
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."perpetrators (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				sex INT(1) NOT NULL,
				skincolor INT(1) NOT NULL,
				clothing TINYTEXT NOT NULL,
				minage INT(100) NOT NULL,
				maxage INT(100) NOT NULL,
				uniqueproperties TINYTEXT NOT NULL,
				report_id INT NOT NULL,
				timestamp TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."reports (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				category_id INT NOT NULL,
				isvisible INT(1) NOT NULL,
				isdeleted INT(1) NOT NULL,
				status INT(1) NOT NULL,
				created TIMESTAMP,
				modified TIMESTAMP,
				description MEDIUMTEXT NOT NULL,
				unconscious INT(1) NOT NULL,
				victim TINYTEXT NOT NULL,
				victimname TINYTEXT NOT NULL,
				weapontype_id INT NOT NULL,
				weapontypeother TINYTEXT NOT NULL,
				weaponlocation TINYTEXT NOT NULL,
				fightercount INT NOT NULL,
				isweaponpresent INT(1) NOT NULL,
				drugsaction_id INT NOT NULL,
				stolenobject MEDIUMTEXT NOT NULL,
				dateoftheft TIMESTAMP,
				contact_id INT NOT NULL,
				location_id INT NOT NULL,
				timestamp TIMESTAMP
			)
		");
	}
	
	private function create($sql) {
		APP::getMysqli()->query($sql);
	}
	
}