<?php

defined("_ROOT")		?: define("_ROOT",			realpath(dirname(__FILE__)));

require _ROOT."/backend/twig/vendor/autoload.php";
require _ROOT."/backend/includes/settings.php";
require _ROOT."/backend/application.php";
require _ROOT."/backend/managers/LibraryManager.php";

if (_ShowErrors) {
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
}

$app = new APP();
$app->run();