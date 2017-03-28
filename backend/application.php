<?php

/**
 * Main APP class
 *
 * @author	Stijn van Nieulande <info@stijndevelopment.nl>
 * @author	Tim van den Enden <tim.vd_evden@me.com>
 *
 */

final class APP {
	
	private static $librarymanager;
	//private static $hybridauth_config;
	//private static $hybridauth;
	//private static $loginmanager;
	//private static $usermanager;
	
	public function __construct() {
		session_start();
		
		//require _ROOT."/backend/includes/hybridauth-2.7.0/hybridauth/Hybrid/Auth.php";
		//require _ROOT."/backend/managers/LoginManager.php";
		//require _ROOT."/backend/managers/UserManager.php";
		
		self::$librarymanager = new LibraryManager();
		
		//self::$hybridauth_config 	= _ROOT."/backend/includes/hybridauth-2.7.0/hybridauth/config.php";
		//self::$hybridauth 			= new Hybrid_Auth(self::$hybridauth_config);
		
		//self::$loginmanager 		= new LoginManager();
		//self::$usermanager 			= new UserManager();
	}

	public function run() {		
		if (isset($_REQUEST['sys']) && $_REQUEST['sys'] != null) {
			/*
			if ($_REQUEST['sys'] == "admin") {
				if (isset($_REQUEST['page']) && $_REQUEST['page'] != null) {
					switch ($_REQUEST['page']) {
						case "data":
							echo APP::getDataManager()->getData();
							break;
						default:
							if (APP::getLoginManager()->login_check()) {
								if (APP::getUserManager()->getPermission() > 0) {
									switch ($_REQUEST['page']) {
										case "login":
											$this->library->getAdminLoginPage();
											break;
										case "dashboard":
											$this->library->getAdminDashboardPage();
											break;
										case "forms":
											if (isset($_REQUEST['type']) && $_REQUEST['type'] != null) {
												switch ($_REQUEST['type']) {
													case "application":
													case "contact":
														if (isset($_REQUEST['id']) && $_REQUEST['id'] != null) {
															$this->library->getAdminFormsForm($_REQUEST['type'], $_REQUEST['id']);
														} else {
															$this->library->getAdminFormsPage($_REQUEST['type']);
														}
														break;
													default:
														$this->library->getAdminFormsPage("application");
												}
											} else {
												$this->library->getAdminFormsPage("application");
											}
											break;
										case "translations":
											$this->library->getAdminTranslationsPage();
											break;
										case "users":
											$this->library->getAdminUsersPage();
											break;
										case "pages":
											if (isset($_REQUEST['p']) && $_REQUEST['p'] != null) {
												switch ($_REQUEST['p']) {
													case "faq":
														$this->library->getAdminPagesFAQPage();
														break;
													case "news":
														$this->library->getAdminPagesNewsPage();
														break;
													case "ihfm":
														$this->library->getAdminPagesIHFMPage();
														break;
													case "origins":
														$this->library->getAdminPagesOriginsPage();
														break;
													case "history":
														$this->library->getAdminPagesHistoryPage();
														break;
													case "downloads":
														$this->library->getAdminPagesDownloadsPage();
														break;
													case "contact":
														$this->library->getAdminPagesContactPage();
														break;
													default:
														$this->library->getAdminPageNotFound();
												}
											} else {
												$this->library->getAdminPageNotFound();
											}
											break;
										default:
											$this->library->getAdminPageNotFound();
									}
								} else {
									$this->library->getAdminNoPermissionPage();
								}
							} else {
								$this->library->getAdminLoginPage();
							}
					}
				} else {
					header("Location: "._PageURL."admin/dashboard");
					exit;
				}
			}
			*/
		} else if (isset($_REQUEST['category']) && $_REQUEST['category'] != null) {
			if (isset($_REQUEST['location']) && $_REQUEST['location'] != null) {
				APP::getLibraryManager()->getCategoryDetailsPage();
			} else {
				APP::getLibraryManager()->getLocationPage();
			}
		} else {
			APP::getLibraryManager()->getHomePage();
		}
	}
	
	public static function getCurrentPage() {
		if (isset($_REQUEST['page']) && $_REQUEST['page'] != null) {
			return $_REQUEST['page'];
		} else {
			return "home";
		}
	}
	
	public static function getFullURL() {
		$url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
		$url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
		$url .= $_SERVER["REQUEST_URI"];
		return $url;
	}
	
	/*
	public static function getHybridauthConfig() {
		return self::$hybridauth_config;
	}
	
	public static function getHybridauth() {
		return self::$hybridauth;
	}
	
	public static function getLoginManager() {
		return self::$loginmanager;
	}
	
	public static function getUserManager() {
		return self::$usermanager;
	}
	*/
	
	public static function getLibraryManager() {
		return self::$librarymanager;
	}
}