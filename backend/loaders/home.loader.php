<?php

require_once _ROOT."/backend/loaders/loader.extend.php";

class Loader_Home extends LoaderExtend {
	
	public function run() {
		if (isset($_COOKIE["reportID"])) {
			unset($_COOKIE["reportID"]);
			setcookie("reportID", null, -1, '/');
		}
	}
	
	public function getData() {
		return array(
			"categories" => $this->getCategories()
		);
	}
	
	private function getCategories() {
		$json_url = _API_URL."report/categories";
		$json = @file_get_contents($json_url);
		$json = json_decode($json, TRUE);
		return $json;
	}
	
}