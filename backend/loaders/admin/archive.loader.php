<?php

require_once _ROOT."/backend/loaders/loader.extend.php";

class Loader_Admin_Archive extends LoaderExtend {
	
	public function getData() {
		return array(
			"reports" 				=> $this->getReports(),
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
	
	private function getReports() {
		$strCookie = 'PHPSESSID=' . $_COOKIE['PHPSESSID'] . '; path=/';
		session_write_close();
		
		$ch = curl_init(_API_URL."admin/archiveReports");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_COOKIE, $strCookie);
		$response = curl_exec($ch); 
		curl_close($ch); 

		if ($response != null && $response != "") {
			return json_decode($response);
		}
		return null;
	}
	
}