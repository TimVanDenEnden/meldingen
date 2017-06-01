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
	private static $report;
	private static $images;
	
	public function __construct() {
		session_start();
		
		require _ROOT."/includes/database.php";
		require _ROOT."/includes/databaseCreateTables.php";
		require _ROOT."/functions/report.php";
		require _ROOT."/functions/images.php";
		require _ROOT."/controller/register.php";
		
		$this->database = new Database();
		self::$mysqli = $this->database->getMysqli();
		if (!$this->database->hasError()) {
			new CreateTables();
		}

		self::$report = new Report();
		self::$images = new Images();
	}

	public function run() {
		if ($this->database->hasError()) {
			//$this->library->getGErrorPage("Database Error", $this->database->getErrorMessage());
			header($_SERVER["SERVER_PROTOCOL"]." 500 Internal server error");
			exit;
		}
		
		if (isset($_GET['sys']) && $_GET['sys'] != null) {
			switch ($_GET['sys']) {
				case "report":
					if (isset($_GET['data']) && $_GET['data'] != null) {
						APP::getReport()->get($_GET['data']);
					} else if (isset($_POST["report_id"])) {
						APP::getReport()->postReport();
					} else {
						header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
					}
					break;
				case "image":
					if (isset($_GET['data']) && $_GET['data'] != null) {
						APP::getImages()->get($_GET['data']);
					} else {
						header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
					}
					break;
				case "register":
					$register = new Registration();
					$return = array();
					$return["errors"] = $register->errors;
					$return["messages"] = $register->messages;
					echo json_encode($return);
					break;
				default:
					header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
					break;
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
	
	public static function getReport() {
		return self::$report;
	}
	
	public static function getImages() {
		return self::$images;
	}
}