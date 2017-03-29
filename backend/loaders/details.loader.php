<?php

require_once _ROOT."/backend/loaders/loader.extend.php";

class Loader_Details extends LoaderExtend {
	
	public function getData() {
		return array(
			"category_id"			=> parent::getLoaderData()['category_id'],
			"categories"			=> $this->getCategories(),
			"location"				=> $this->getLocation(),
			"location_id"			=> parent::getLoaderData()['location_id'],
			"location_categories"	=> $this->getLocationCategories(),
			"pageblocks"			=> $this->getPageBlocks()
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