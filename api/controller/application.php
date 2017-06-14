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
	private static $admin;
	private static $images;
	private static $register;
	private static $login;
	
	public function __construct() {
		session_start();
		
		require _ROOT."/includes/database.php";
		require _ROOT."/includes/databaseCreateTables.php";
		require _ROOT."/functions/report.php";
		require _ROOT."/functions/admin.php";
		require _ROOT."/functions/images.php";
		require _ROOT."/controller/register.php";
		require _ROOT."/controller/login.php";
		
		$this->database = new Database();
		self::$mysqli = $this->database->getMysqli();
		if (!$this->database->hasError()) {
			new CreateTables();
		}

		self::$report 	= new Report();
		self::$admin 	= new Admin();
		self::$images 	= new Images();
		self::$register = new Registration();
		self::$login 	= new Login();
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
					//print_r($_POST);
					//header($_SERVER["SERVER_PROTOCOL"]." 200 Forbidden");
					//return;
				
					if (isset($_GET['data']) && $_GET['data'] != null) {
						APP::getReport()->get($_GET['data']);
					} else if (isset($_POST["report_id"])) {
						APP::getReport()->postReport();
					} else {
						print_r($_POST);
						header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
					}
					break;
				case "admin":
					if (isset($_GET['data']) && $_GET['data'] != null) {
						APP::getAdmin()->get($_GET['data']);
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
					if (APP::getLogin()->isUserLoggedIn()) {
						APP::getRegister()->register();
						$return = array();
						$return["errors"] = APP::getRegister()->errors;
						$return["messages"] = APP::getRegister()->messages;
						echo json_encode($return);
					} else {
						header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
					}
					break;
				case "login":
					if (!APP::getLogin()->isUserLoggedIn()) {
						APP::getLogin()->login();
						$return = array();
						$return["errors"] = APP::getLogin()->errors;
						$return["messages"] = APP::getLogin()->messages;
						echo json_encode($return);
					} else {
						// already loggedin
					}
					if (isset($_GET['data']) && $_GET['data'] != null) { // Return URL
						$url = urldecode($_GET['data']);
						if (!(substr($url, 0, 7) === "http://" || substr($url, 0, 8) === "https://")) {
							if (substr($url, 0, 6) === "http:/") {
								$url = preg_replace('/^'.preg_quote("http:/", '/').'/', 'http://', $url);
							} else if (substr($url, 0, 7) === "https:/") {
								$url = preg_replace('/^'.preg_quote("https:/", '/').'/', 'https://', $url);
							}
						}
						header("Location: ".$url);
					}	
					break;
				case "logout":
					if (APP::getLogin()->isUserLoggedIn()) {
						APP::getLogin()->logout();
						$return = array();
						$return["errors"] = APP::getLogin()->errors;
						$return["messages"] = APP::getLogin()->messages;
						echo json_encode($return);
					} else {
						// already loggedout
					}
					break;
				case "request_loggedin":
					if (APP::getLogin()->isUserLoggedIn()) {
						echo "true";
					} else {
						echo "false";
					}
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
	
	public static function getAdmin() {
		return self::$admin;
	}
	
	public static function getImages() {
		return self::$images;
	}
	
	public static function getRegister() {
		return self::$register;
	}
	public static function getLogin() {
		return self::$login;
	}
}