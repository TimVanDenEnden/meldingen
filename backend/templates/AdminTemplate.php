<?php

require_once _ROOT."/backend/templates/template.extend.php";

class AdminTemplate extends TemplateExtend {
	
	function __construct() {		
		parent::setLoader(new Twig_Loader_Filesystem(_ROOT."/frontend/admin/templates"));
		parent::setTwig(
			new Twig_Environment(parent::getLoader(), array(
				'debug' => true,
				"cache" => _ROOT."/backend/twig/compilation_cache",
				'auto_reload' => true
			))
		);
		
		$function = new Twig_SimpleFunction('hasPermission', function ($permission) {
			return APP::hasPermission($permission);
		});
		parent::getTwig()->addFunction($function);
		
		parent::getTwig()->addExtension(new Twig_Extension_Debug());
		parent::getTwig()->clearCacheFiles();
	}
	
}