<?php

require_once _ROOT."/backend/loaders/loader.extend.php";

class Loader_Empty extends LoaderExtend {
	
	public function getFunctions() {
		$function = new Twig_SimpleFunction('menuIsPage', function ($p) {
			echo $this->menuIsPage($p) ? 'active' : '';
		});
		parent::getTwig()->addFunction($function);
	}
	
	private function menuIsPage($p) {
		$array = explode(", ", $p);
		foreach ($array as $a) {
			if (isset($_REQUEST['page'])) {
				if ($_REQUEST['page'] == $a) {
					return true;
				}
			} else {
				if ($a == "ihfm") {
					return true;
				}
			}
		}
		return false;
	}
	
}