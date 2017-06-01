<?php

class CreateTables {
	
	function __construct() {
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."locations (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				category_id INT NOT NULL,
				building TINYTEXT NOT NULL,
				image_id INT NOT NULL,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."location_category (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."category (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				image_id INT NOT NULL,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."weapons (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."drugsactions (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."contacts (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				phonenumber TINYTEXT NOT NULL,
				emailadress TINYTEXT NOT NULL,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."vehicletypes (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name TINYTEXT NOT NULL,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
				report_id TINYTEXT NOT NULL,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		");
		
		/*
			status:
				0: Open
				1: Solved
				2: Transferred
		
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
				perpetrator_id TINYTEXT NOT NULL,
				name TINYTEXT NOT NULL,
				sex INT(1) NOT NULL,
				skincolor INT(1) NOT NULL,
				clothing TINYTEXT NOT NULL,
				age INT(1) NOT NULL,
				uniqueproperties TINYTEXT NOT NULL,
				report_id TINYTEXT NOT NULL,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		");
		
		/* OLD
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."reports (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				report_id TINYTEXT NOT NULL,
				category_id INT NOT NULL,
				isvisible INT(1) NOT NULL,
				isdeleted INT(1) NOT NULL,
				status INT(1) NOT NULL,
				created TIMESTAMP,
				modified TIMESTAMP,
				description MEDIUMTEXT,
				unconscious INT(1),
				victim TINYTEXT,
				victimname TINYTEXT,
				weapontype_id INT,
				weapontypeother TINYTEXT,
				weaponlocation TINYTEXT,
				fightercount INT,
				isweaponpresent INT(1),
				drugsaction_id INT,
				stolenobject MEDIUMTEXT,
				dateoftheft TIMESTAMP,
				contact_id INT,
				location_id INT,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			)
		");
		*/

		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."reports (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				report_id TINYTEXT NOT NULL,
				category_id INT NOT NULL,
				isvisible INT(1) NOT NULL,
				isdeleted INT(1) NOT NULL,
				status INT(1) NOT NULL,
				created TIMESTAMP DEFAULT '0000-00-00 00:00:00',
				modified TIMESTAMP DEFAULT '0000-00-00 00:00:00',
				description MEDIUMTEXT,
				moreinfo MEDIUMTEXT,
				unconscious INT(1),
				victim TINYTEXT,
				victimname TINYTEXT,
				weapontype_id INT,
				weapontypeother TINYTEXT,
				weaponlocation TINYTEXT,
				fightercount INT,
				isweaponpresent INT(1),
				drugsaction_id INT,
				stolenobject MEDIUMTEXT,
				dateoftheft TIMESTAMP DEFAULT '0000-00-00 00:00:00',
				contact_id INT,
				location_id INT,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			)
		");
		
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."images (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				image_id TINYTEXT NOT NULL,
				path TINYTEXT NOT NULL,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		");
		
		/* OLD
		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."images (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				type TINYTEXT NOT NULL,
				data LONGBLOB NOT NULL,
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		");
		*/

		$this->create("
			CREATE TABLE IF NOT EXISTS "._DB_PREFIX."pageblocks (
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				category_id INT NOT NULL,
				title TINYTEXT,
				blockname TINYTEXT,
				data TINYTEXT,
				required INT(1) DEFAULT '0',
				timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			)
		");
	}
	
	private function create($sql) {
		APP::getMysqli()->query($sql);
	}
	
}