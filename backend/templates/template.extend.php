<?php

class TemplateExtend {
	
	private $loader;
	private $twig;
	
	public function render($template, $data = array()){
		$rendered = $this->twig->createTemplate($this->twig->render($template.'.tpl', $data));
		return $rendered->render($data); // rendering tags after translation
	}
	
	public function getTwig() {
		return $this->twig;
	}
	
	public function setTwig($twig) {
		$this->twig = $twig;
	}
	
	public function getLoader() {
		return $this->loader;
	}
	
	public function setLoader($loader) {
		$this->loader = $loader;
	}
	
}