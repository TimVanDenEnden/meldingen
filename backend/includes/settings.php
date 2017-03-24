<?php

/**
 * Settings
 *
 * @author	Stijn van Nieulande <info@stijndevelopment.nl>
 * @author	Tim van den Enden <tim.vd_evden@me.com>
 *
 */

defined("_DB_HOST")				?: define("_DB_HOST",			"stijndevelopment.ga");
defined("_DB_USER")				?: define("_DB_USER",			"API");
defined("_DB_PASSWORD")			?: define("_DB_PASSWORD",		"CPZ5ETttmt8N0uIv");
defined("_DB_DATABASE")			?: define("_DB_DATABASE",		"Meldingen");
defined("_DB_PREFIX")			?: define("_DB_PREFIX",			"Meld_");

defined("_ROOTFOLDER") 			?: define("_ROOTFOLDER",		"");
defined("_PageTitle") 			?: define("_PageTitle",			"Meldingen");

defined("_API_URL") 			?: define("_API_URL",			"http://meldingen.dev/api/");

defined("_ShowErrors") 			?: define("_ShowErrors",		true);

/***********************************
	DO NOT EDIT THE LINES BELOW!
***********************************/

$host = $_SERVER["HTTP_HOST"];
#$host_names = explode(".", $host);
#$domain = $host_names[count($host_names) - 2].".".$host_names[count($host_names) - 1];
#$mainURL = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$domain :  'https://'.$domain;
$mainURL = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$host :  'https://'.$host;

defined("_SiteURL") 			?: define("_SiteURL", 			$mainURL._ROOTFOLDER."/");
defined("_PageURL") 			?: define("_PageURL", 			$mainURL._ROOTFOLDER."/");