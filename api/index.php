<?php

defined("_ROOT")		?: define("_ROOT",			realpath(dirname(__FILE__)));

require _ROOT."/includes/settings.php";
require _ROOT."/controller/application.php";

if (_ShowErrors) {
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
}

$app = new APP();
$app->run();