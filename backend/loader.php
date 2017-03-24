<?php

class Loader {
	
	private $tpl;
	private $twig;
	private $isAdmin;
	private $loaderdata;
	
	public function __construct($tpl, $admin = false, $loaderdata = array()) {
		$this->tpl = $tpl;
		$this->twig = $this->tpl->getTwig();
		$this->isAdmin = $admin;
		$this->loaderdata = $loaderdata;
	}
	
	public function load($template, $extraData = array(), $loadername = null) {
		$data 			= array();
		$loader_path	= $loadername != null ? $loadername : $template;
		
		if (!$this->isAdmin) {
			$loaderPath	= _ROOT."/backend/loaders/".$loader_path.".loader.php";
		} else {
			$loaderPath	= _ROOT."/backend/loaders/admin/".$loader_path.".loader.php";
		}
		
		if (file_exists($loaderPath)) {
			require $loaderPath;
			
			$tmp_name 		= explode('/', $template);
			$loadername_e 	= explode('/', $loadername);
			$tmp_name 		= $loadername != null ? end($loadername_e) : end($tmp_name);
			$tmp = "Loader_".$tmp_name;
			$loader = new $tmp($this->twig, $this->loaderdata);
			$loader->run();
			$data = $loader->getData();
			$loader->getFunctions();
			
			$this->tpl->setTwig($loader->getTwig());
		}
		
		$data = array_merge($data, array(
			'SiteURL'	=> _SiteURL,
			'PageURL'	=> _PageURL,
			'API_URL'	=> _API_URL
		));
		$data = array_merge($data, $extraData);
 
		return $this->tpl->render($template, $data);
	}
	
	public function getTwig() {
		return $this->twig;
	}
	
}