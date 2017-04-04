<?php

require_once _ROOT."/backend/loaders/loader.extend.php";

class Loader_Details extends LoaderExtend {
	
	public function run() {
		$report_id = isset($_COOKIE["reportID"]) ? $_COOKIE["reportID"] : null;
		$location_id = isset($_REQUEST["location"]) ? $_REQUEST["location"] : null;
		
		if ($report_id != null && $location_id != null) {
			$curl = curl_init();
			
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => _API_URL."report/setreportlocation",
				CURLOPT_POST => 1,
				CURLOPT_POSTFIELDS => array(
					"report_id" => $report_id,
					"location_id" => $location_id
				)
			));
			
			$resp = curl_exec($curl);
			curl_close($curl);
		}
	}
	
	public function getData() {
		return array(
			"category_id"			=> parent::getLoaderData()['category_id'],
			"categories"			=> $this->getCategories(),
			"location"				=> $this->getLocation(),
			"weapons"				=> $this->getWeapons(),
			"drugs_actions"			=> $this->getDrugsActions(),
			"location_id"			=> parent::getLoaderData()['location_id'],
			"location_categories"	=> $this->getLocationCategories(),
			"pageblocks"			=> $this->getPageBlocks(),
			"report_id" 			=> isset($_COOKIE["reportID"]) ? $_COOKIE["reportID"] : null
		);
	}
	
	private function getCategories() {
		$json_url = _API_URL."report/categories";
		$json = @file_get_contents($json_url);
		$json = json_decode($json, TRUE);
		return $json;
	}
	
	private function getLocation() {
		$json_url = _API_URL."report/locations";
		$json = @file_get_contents($json_url);
		$json = json_decode($json, TRUE);

		foreach($json as $key => $value) { 
			if ($key == parent::getLoaderData()['location_id']) {
				return $value;
			}
		}

		return null;
	}

	private function getWeapons() {
		$json_url = _API_URL."report/weapons";
		$json = @file_get_contents($json_url);
		$json = json_decode($json, TRUE);
		return $json;
	}

	private function getDrugsActions() {
		$json_url = _API_URL."report/drugsactions";
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

	private function getPageBlocks() {
		$json_url = _API_URL."report/pageblocks/" . parent::getLoaderData()['category_id'];
		$json = @file_get_contents($json_url);
		$json = json_decode($json, TRUE);
		return $json;
	}
	
}