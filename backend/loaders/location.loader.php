<?php

require_once _ROOT."/backend/loaders/loader.extend.php";

class Loader_Location extends LoaderExtend {
	
	public function getData() {
		return array(
			"category_id"			=> isset($_REQUEST["category"]) ? $_REQUEST["category"] : 0,
			"categories"			=> $this->getCategories(),
			"locations"				=> $this->getLocations(),
			"location_categories"	=> $this->getLocationCategories()
		);
	}
	
	private function getCategories() {
		$json_url = _API_URL."report/categories";
		$json = @file_get_contents($json_url);
		$json = json_decode($json, TRUE);
		return $json;
	}
	
	private function getLocations() {
		$json_url = _API_URL."report/locations";
		$json = @file_get_contents($json_url);
		$json = json_decode($json, TRUE);
		return $json;
	}
	
	private function getLocationCategories() {
		$json_url = _API_URL."report/location_categories";
		$json = @file_get_contents($json_url);
		$json = json_decode($json, TRUE);
		return $json;
	}
	
}