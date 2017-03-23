<?php

class LoaderExtend {
	
	private $twig;
	private $loaderdata;
	
	function __construct($twig, $loaderdata = array()) {
		$this->twig = $twig;
		$this->loaderdata = $loaderdata;
	}
	
	public function getData() {
		return array();
	}
	
	public function getFunctions() {
		
	}
	
	public function run() {
		
	}
	
	public function getTwig() {
		return $this->twig;
	}
	
	public function getLoaderData() {
		return $this->loaderdata;
	}
	
}