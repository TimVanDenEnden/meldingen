<?php

require_once _ROOT."/backend/templates/template.extend.php";

class MainTemplate extends TemplateExtend {
	
	function __construct() {		
		parent::setLoader(new Twig_Loader_Filesystem(_ROOT."/frontend/templates"));
		parent::setTwig(
			new Twig_Environment(parent::getLoader(), array(
				'debug' => true,
				"cache" => _ROOT."/backend/twig/compilation_cache",
				'auto_reload' => true
			))
		);
		
		parent::getTwig()->addExtension(new Twig_Extension_Debug());
		parent::getTwig()->clearCacheFiles();
	}
	
}