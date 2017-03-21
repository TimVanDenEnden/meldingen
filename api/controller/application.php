<?php

/**
 * Main APP class
 *
 * @author	Stijn van Nieulande <info@stijndevelopment.nl>
 * @author	Tim van den Enden <tim.vd_evden@me.com>
 *
 */

final class APP {
	
	private $database;
	private static $mysqli;
	
	public function __construct() {
		session_start();
		
		require _ROOT."/includes/database.php";
		require _ROOT."/includes/databaseCreateTables.php";
		
		$this->database = new Database();
		self::$mysqli = $this->database->getMysqli();
		if (!$this->database->hasError()) {
			new CreateTables();
		}
	}

	public function run() {
		if ($this->database->hasError()) {
			//$this->library->getGErrorPage("Database Error", $this->database->getErrorMessage());
			// 500 ERROR
			exit;
		}
		
		if (isset($_REQUEST['sys']) && $_REQUEST['sys'] != null) {
			switch ($_REQUEST['sys']) {
				case "test":
					print_r(APP::getMysqli());
					break;
				default:
					//$this->library->getSystemNotFound();
			}
		} else {
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
			exit;
		}
	}
	
	public static function getMysqli() {
		return self::$mysqli;
	}
	
	public static function getFullURL() {
		$url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
		$url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
		$url .= $_SERVER["REQUEST_URI"];
		return $url;
	}
}