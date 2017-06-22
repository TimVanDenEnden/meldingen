<?php

require_once _ROOT."/backend/loaders/loader.extend.php";

class Loader_Admin_Users extends LoaderExtend {
	
	public function getData() {
		return array(
			"users" 				=> $this->getUsers()
		);
	}
	
	private function getUsers() {
		$userlist = $this->getUsersList();
		$return = array();
		
		foreach ($userlist as $id => $data) {
			$return[$id]["user_name"]		= $data->user_name;
			$return[$id]["user_email"]		= $data->user_email;
			$return[$id]["user_isadmin"]	= $data->user_isadmin;
			$return[$id]["permissions"]		= $this->getUserPermissions($id);
		}
		
		return $return;
	}
	
	private function getUserPermissions($user_id) {
		$strCookie = 'PHPSESSID=' . $_COOKIE['PHPSESSID'] . '; path=/';
		session_write_close();
		
		$ch = curl_init(_API_URL."admin/userPermissions/".$user_id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_COOKIE, $strCookie);
		$response = curl_exec($ch); 
		curl_close($ch); 

		if ($response != null && $response != "") {
			return json_decode($response);
		}
		return null;
	}
	
	private function getUsersList() {
		$strCookie = 'PHPSESSID=' . $_COOKIE['PHPSESSID'] . '; path=/';
		session_write_close();
		
		$ch = curl_init(_API_URL."admin/users");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_COOKIE, $strCookie);
		$response = curl_exec($ch); 
		curl_close($ch); 

		if ($response != null && $response != "") {
			return json_decode($response);
		}
		return null;
	}
	
}