<?php

require_once _ROOT."/backend/loaders/loader.extend.php";

class Loader_Home extends LoaderExtend {
	
	public function getData() {
		return array(
			"test" => "test123"
		);
	}
	
}