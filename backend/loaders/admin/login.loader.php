<?php

require_once _ROOT."/backend/loaders/loader.extend.php";

class Loader_Login extends LoaderExtend {
	
	public function getData() {
		return array(
			"RETURN_URL" => urlencode((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")
		);
	}
	
}