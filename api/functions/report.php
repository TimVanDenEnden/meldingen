<?php

//sys=report&data=location_categories

class Report {
	
	public function get($data) {
		switch ($data) {
			case "categories":
				$result = APP::getMysqli()->query("SELECT * FROM "._DB_PREFIX."category");
				$jsonArray = array();
				
				while($row = $result->fetch_array()) {
					array_push($jsonArray, array(
						$row["id"],
						$row["name"]
					));
				}
				
				echo json_encode($jsonArray);
				header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				break;
			case "location_categories":
				$result = APP::getMysqli()->query("SELECT * FROM "._DB_PREFIX."location_category");
				$jsonArray = array();
				
				while($row = $result->fetch_array()) {
					array_push($jsonArray, array(
						$row["id"],
						$row["name"]
					));
				}
				
				echo json_encode($jsonArray);
				header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				break;
			case "locations":
				$result = APP::getMysqli()->query("SELECT * FROM "._DB_PREFIX."locations");
				$jsonArray = array();
				
				while($row = $result->fetch_array()) {
					array_push($jsonArray, array(
						$row["category_id"],
						$row["building"]
					));
				}
				
				echo json_encode($jsonArray);
				header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				break;
			case "weapons":
				break;
			case "drugsactions":
				break;
			case "vehicletypes":
				break;
		}
	}
	
}