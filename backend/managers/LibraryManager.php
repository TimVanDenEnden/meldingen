<?php

class LibraryManager {
	
	public function __construct() {
		require _ROOT."/backend/templates/MainTemplate.php";
		require _ROOT."/backend/templates/AdminTemplate.php";
		require _ROOT."/backend/loader.php";
    }
	
	/********************
		MAIN TEMPLATES
	********************/
	
	private function renderPage($title, $content) {
		$loader = new Loader(new MainTemplate());
		$data = array(
			'title'		=> $title." | "._PageTitle,
			'CONTENT'	=> $content,
		);
		echo $loader->load('empty', $data);
	}
	
	public function getHomePage() {
		$loader = new Loader(new MainTemplate());
		echo $this->renderPage("Categorie", $loader->load('home'));
	}
	
	public function getLocationPage() {
		$loader = new Loader(new MainTemplate());
		echo $this->renderPage("Locatie", $loader->load('location'));
	}
	
	public function getCategoryDetailsPage() {
		$data = array(
			"category_id" => isset($_REQUEST["category"]) ? $_REQUEST["category"] : 0,
			"location_id" => isset($_REQUEST["location"]) ? $_REQUEST["location"] : 0
		);

		$loader = new Loader(new MainTemplate(), false, $data);

		echo $this->renderPage("Details", $loader->load('details'));
	}
	
	public function getPageNotFound() {
		echo $this->getErrorPage("Page not found (404)", "Something went wrong. We couldn't find this page.");
	}
	
	public function getErrorPage($errortitle, $errordescription) {
		$loader = new Loader(new MainTemplate());
		$data = array(
			'errortitle'	=> $errortitle,
			'errordesc'		=> $errordescription,
		);
		echo $this->renderPage("Error", $loader->load('error', $data));
	}
	
	/*
	public function getHomePage() {
		$data = array(
			'receiver' => 'JR',
			'date' => date("l j F o"),
			'testrequest' => $_REQUEST['test'],
			'player' => array(
				'name' => 'CodingWarrior',
				'uuid' => '1234567890',
				'coins' => '888',
			),
		);
 
		$tpl = new MainTemplate();
		echo $tpl->render('index', $data);
	}
	*/
	
	/********************
		ADMIN TEMPLATES
	********************/
	
	private function renderAdminPage($title, $content, $hide_nav = false) {
		$loader = new Loader(new AdminTemplate(), true);
		$data = array(
			'HeaderTitle'	=> $title,
			'HIDE_NAV'		=> $hide_nav,
			'ADMIN_CONTENT'	=> $content,
		);
		$contentTemplate = $loader->load('empty', $data);
		
		$loader = new Loader(new MainTemplate());
		$data = array(
			'title'		=> $title." | Admin | "._PageTitle,
			'CONTENT'	=> $contentTemplate,
		);
		echo $loader->load('empty', $data);
	}
	
	/*
	private function getDefaultAdminDataArray() {
		return array(
			'PageURL'	=> _PageURL."admin/"
		);
	}
	
	private function getUserDataArray() {
		return array (
			"UserProfile" => array(
				"id" 		=> APP::getUserManager()->getId(),
				"email" 	=> APP::getUserManager()->email(),
				"firstname" => APP::getUserManager()->firstname(),
				"lastname" 	=> APP::getUserManager()->lastname(),
				"fullname" 	=> APP::getUserManager()->fullname(),
				"photo" 	=> APP::getUserManager()->photo(),
			)
		);
	}
	
	private function renderAdminPage($title, $content) {
		$loader = new Loader(new AdminTemplate(), true);
		$data = array(
			'title'		=> $title." | Admin | "._PageTitle,
			'CONTENT'	=> $content
		);
		$data = array_merge($data, $this->getDefaultAdminDataArray());
		$data = array_merge($data, $this->getUserDataArray());
		echo $loader->load('empty', $data);
	}
	*/
	public function getAdminDashboardPage() {
		$loader = new Loader(new AdminTemplate(), true);
		echo $this->renderAdminPage("Dashboard", $loader->load('dashboard'));
	}
	/*
	public function getAdminFormsPage($type) {
		$loaderdata = array(
			"type"	=> strtoupper($type)
		);
		$loader = new Loader(new AdminTemplate(), true, $loaderdata);
		$data = $this->getDefaultAdminDataArray();
		echo $this->renderAdminPage("Forms", $loader->load('forms', $data));
	}
	
	public function getAdminFormsForm($type, $id) {
		$loaderdata = array(
			"type" 	=> strtoupper($type),
			"id" 	=> $id
		);
		$loader = new Loader(new AdminTemplate(), true, $loaderdata);
		$data = $this->getDefaultAdminDataArray();
		echo $this->renderAdminPage("Form", $loader->load('form', $data));
	}
	
	public function getAdminTranslationsPage() {
		$loader = new Loader(new AdminTemplate(), true);
		echo $this->renderAdminPage("Translations", $loader->load('translations', $this->getDefaultAdminDataArray()));
	}
	
	public function getAdminUsersPage() {
		$loader = new Loader(new AdminTemplate(), true);
		$data = $this->getDefaultAdminDataArray();
		$data = array_merge($data, $this->getUserDataArray());
		echo $this->renderAdminPage("Users", $loader->load('users', $data));
	}
	
	public function getAdminPagesFAQPage() {
		$loader = new Loader(new AdminTemplate(), true);
		echo $this->renderAdminPage("FAQ", $loader->load('pages/faq', $this->getDefaultAdminDataArray()));
	}
	
	public function getAdminPagesNewsPage() {
		$data = array(
			'pagename'		=> "news",
			'page_title'	=> APP::getTranslation("admin.title.news")
		);
		$loader = new Loader(new AdminTemplate(), true, $data);
		$data = array_merge($data, $this->getDefaultAdminDataArray());
		echo $this->renderAdminPage("News", $loader->load('pages/page', $data, 'pages/page'));
	}
	
	public function getAdminPagesIHFMPage() {
		$data = array(
			'pagename'		=> "ihfm",
			'page_title'	=> APP::getTranslation("admin.title.ihfm")
		);
		$loader = new Loader(new AdminTemplate(), true, $data);
		$data = array_merge($data, $this->getDefaultAdminDataArray());
		echo $this->renderAdminPage("IHFM", $loader->load('pages/page', $data, 'pages/page'));
	}
	
	public function getAdminPagesOriginsPage() {
		$data = array(
			'pagename'		=> "origins",
			'page_title'	=> APP::getTranslation("admin.title.origins")
		);
		$loader = new Loader(new AdminTemplate(), true, $data);
		$data = array_merge($data, $this->getDefaultAdminDataArray());
		echo $this->renderAdminPage("Origins", $loader->load('pages/page', $data, 'pages/page'));
	}
	
	public function getAdminPagesHistoryPage() {
		$data = array(
			'pagename'		=> "history",
			'page_title'	=> APP::getTranslation("admin.title.history")
		);
		$loader = new Loader(new AdminTemplate(), true, $data);
		$data = array_merge($data, $this->getDefaultAdminDataArray());
		echo $this->renderAdminPage("History", $loader->load('pages/page', $data, 'pages/page'));
	}
	
	public function getAdminPagesDownloadsPage() {
		$data = array(
			'pagename'		=> "downloads",
			'page_title'	=> APP::getTranslation("admin.title.downloads")
		);
		$loader = new Loader(new AdminTemplate(), true, $data);
		$data = array_merge($data, $this->getDefaultAdminDataArray());
		echo $this->renderAdminPage("Downloads", $loader->load('pages/page', $data, 'pages/page'));
	}
	
	public function getAdminPagesContactPage() {
		$data = array(
			'pagename'		=> "contact",
			'page_title'	=> APP::getTranslation("admin.title.contact")
		);
		$loader = new Loader(new AdminTemplate(), true, $data);
		$data = array_merge($data, $this->getDefaultAdminDataArray());
		echo $this->renderAdminPage("Contact", $loader->load('pages/page', $data, 'pages/page'));
	}
	
	public function getAdminPageNotFound() {
		echo $this->getAdminErrorPage("404", "Something went wrong. We couldn't find this page.");
	}
	
	public function getAdminNoPermissionPage() {
		$loader = new Loader(new AdminTemplate(), true);
		$data = array(
			'title'			=> "No Permission | Admin | "._PageTitle,
			'errortitle'	=> "No Permission",
			'errordesc'		=> "Sorry, you don't have the permission to view this page.<br>If you think this is an error, please contact an administrator!",
		);
		$data = array_merge($data, $this->getDefaultAdminDataArray());
		echo $loader->load('error', $data);
	}
	
	public function getAdminErrorPage($errortitle, $errordescription) {
		$loader = new Loader(new AdminTemplate(), true);
		$data = array(
			'title'			=> $errortitle." | Admin | "._PageTitle,
			'errortitle'	=> $errortitle,
			'errordesc'		=> $errordescription,
		);
		$data = array_merge($data, $this->getDefaultAdminDataArray());
		echo $loader->load('error', $data);
	}
	*/
	public function getAdminLoginPage() {
		$loader = new Loader(new AdminTemplate(), true);
		echo $this->renderAdminPage("Login | AdminPanel", $loader->load('login'), true);
	}
}