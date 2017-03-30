<?php

class Report {
	
	public function get($data) {
		switch ($data) {
			case "categories":
				$result = APP::getMysqli()->query("SELECT * FROM "._DB_PREFIX."category");
				$jsonArray = array();
				
				while($row = $result->fetch_array()) {
					array_push($jsonArray, array(
						"id"		=> $row["id"],
						"name"		=> $row["name"],
						"image_id"	=> $row["image_id"]
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
						"id"	=> $row["id"],
						"name"	=> $row["name"]
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
						"id"			=> $row["id"],
						"category_id"	=> $row["category_id"],
						"building"		=> $row["building"],
						"image_id"		=> $row["image_id"]
					));
				}
				
				echo json_encode($jsonArray);
				header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				break;
			case "weapons":
				$result = APP::getMysqli()->query("SELECT * FROM "._DB_PREFIX."weapons");
				$jsonArray = array();
				
				while($row = $result->fetch_array()) {
					array_push($jsonArray, array(
						"id"	=> $row["id"],
						"name"	=> $row["name"]
					));
				}
				
				echo json_encode($jsonArray);
				header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				break;
			case "drugsactions":
				$result = APP::getMysqli()->query("SELECT * FROM "._DB_PREFIX."drugsactions");
				$jsonArray = array();
				
				while($row = $result->fetch_array()) {
					array_push($jsonArray, array(
						"id"	=> $row["id"],
						"name"	=> $row["name"]
					));
				}
				
				echo json_encode($jsonArray);
				header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				break;
			case "vehicletypes":
				$result = APP::getMysqli()->query("SELECT * FROM "._DB_PREFIX."vehicletypes");
				$jsonArray = array();
				
				while($row = $result->fetch_array()) {
					array_push($jsonArray, array(
						"id"	=> $row["id"],
						"name"	=> $row["name"]
					));
				}
				
				echo json_encode($jsonArray);
				header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				break;
			case "pageblocks":
				if (isset($_GET['category_id']) && $_GET['category_id'] != null) {
					$sql = "SELECT * FROM "._DB_PREFIX."pageblocks WHERE category_id=?";
					$statement = APP::getMysqli()->prepare($sql);
					$statement->bind_param("i", $_GET['category_id']);
					$statement->execute();

					$result = $statement->get_result();
					$jsonArray = array();
					
					while($row = $result->fetch_array()) {
						array_push($jsonArray, array(
							"id"	=> $row["id"],
							"category_id"	=> $row["category_id"],
							"title"	=> $row["title"],
							"blockname"	=> $row["blockname"],
							"required"	=> $row["required"],
							"data"	=> $row["data"]
						));
					}
					
					echo json_encode($jsonArray);
					header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				} else {
					header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
				}
				break;
			case "createreport":
				if (isset($_GET['category_id']) && $_GET['category_id'] != null) {
					$category_id	= $_GET['category_id'];
					$isvisible		= 1;
					$isdeleted		= 0;
					$status			= 0;
					
					$stmt = APP::getMysqli()->prepare("INSERT INTO "._DB_PREFIX."reports (
						category_id,
						isvisible,
						isdeleted,
						status,
						created,
						modified
					) VALUES (?, ?, ?, ?, NOW(), NOW())");
					$stmt->bind_param("iiii", $category_id, $isvisible, $isdeleted, $status);
					
					if ($stmt->execute()) {
						$insert_id = $stmt->insert_id;
						$report_id = uniqid("report_{$insert_id}_");
						
						$stmt2 = APP::getMysqli()->prepare("UPDATE "._DB_PREFIX."reports SET report_id = ? WHERE id = ?");
						$stmt2->bind_param("si", $report_id, $insert_id);
						$stmt2->execute();
						
						echo json_encode(array("report_id" => $report_id));
						header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
					} else {
						header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error");
					}
				} else {
					header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
				}
				break;
			default:
				header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
		}
	}
	
	public function postReport() {
		if (isset($_POST["postreport"], $_POST["category_id"])) {
			/*
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				category_id INT NOT NULL,
				isvisible INT(1) NOT NULL,
				isdeleted INT(1) NOT NULL,
				status INT(1) NOT NULL,
				created TIMESTAMP,
				modified TIMESTAMP,
				description MEDIUMTEXT,
				unconscious INT(1),
				victim TINYTEXT,
				victimname TINYTEXT,
				weapontype_id INT,
				weapontypeother TINYTEXT,
				weaponlocation TINYTEXT,
				fightercount INT,
				isweaponpresent INT(1),
				drugsaction_id INT,
				stolenobject MEDIUMTEXT,
				dateoftheft TIMESTAMP,
				contact_id INT,
				location_id INT,
				timestamp TIMESTAMP
			*/
			
			$category_id		= $_POST["category_id"];
			$description		= isset($_POST["description"]) 		? $_POST["description"] 	: null;
			$unconscious		= isset($_POST["unconscious"]) 		? $_POST["unconscious"] 	: null;
			$victim				= isset($_POST["victim"]) 			? $_POST["victim"] 			: null;
			$victimname			= isset($_POST["victimname"]) 		? $_POST["victimname"] 		: null;
			$weapontype_id		= isset($_POST["weapontype_id"]) 	? $_POST["weapontype_id"] 	: null;
			$weapontypeother	= isset($_POST["weapontypeother"]) 	? $_POST["weapontypeother"] : null;
			$weaponlocation		= isset($_POST["weaponlocation"]) 	? $_POST["weaponlocation"] 	: null;
			$fightercount		= isset($_POST["fightercount"]) 	? $_POST["fightercount"] 	: null;
			$isweaponpresent	= isset($_POST["isweaponpresent"]) 	? $_POST["isweaponpresent"] : null;
			$drugsaction_id		= isset($_POST["drugsaction_id"]) 	? $_POST["drugsaction_id"] 	: null;
			$stolenobject		= isset($_POST["stolenobject"]) 	? $_POST["stolenobject"] 	: null;
			$contact_id			= isset($_POST["contact_id"]) 		? $_POST["contact_id"] 		: null;
			$location_id		= isset($_POST["location_id"]) 		? $_POST["location_id"] 	: null;
			
			$stmt = APP::getMysqli()->prepare("INSERT INTO "._DB_PREFIX."reports (
				category_id,
				isvisible,
				isdeleted,
				status,
				created,
				modified,
				description,
				unconscious,
				victim,
				victimname,
				weapontype_id,
				weapontypeother,
				weaponlocation,
				fightercount,
				isweaponpresent,
				drugsaction_id,
				stolenobject,
				dateoftheft,
				contact_id,
				location_id
			) VALUES (?, ?, ?, ?, NOW(), NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?)");
			$stmt->bind_param("iiiisississiiissii", 
				$category_id,
				1,
				0,
				0,
				$description,
				$unconscious,
				$victim,
				$victimname,
				$weapontype_id,
				$weapontypeother,
				$weaponlocation,
				$fightercount,
				$isweaponpresent,
				$drugsaction_id,
				$stolenobject,
				$contact_id,
				$location_id
			);
			
			if ($stmt->execute()) {
				$reportID = $stmt->insert_id;
				
				if (isset($_POST["perpetrators"])) {
					
				}
				if (isset($_POST["vehicles"])) {
					
				}
				if (isset($_POST["images"])) {
					
				}
			}
		}
	}
	
}