<?php

class Admin {
	
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
			case "recentReports":
				if (APP::getLogin()->isUserLoggedIn()) {
					$result = APP::getMysqli()->query("SELECT * FROM "._DB_PREFIX."reports WHERE status <= 1 ORDER BY created DESC, status DESC");
					
					$target_date = date('Y-m-d', strtotime('-1 day'));
					$sql = "SELECT * FROM "._DB_PREFIX."reports WHERE status='2' AND DATE(modified) >= ? ORDER BY created DESC, status DESC";
					$statement = APP::getMysqli()->prepare($sql);
					$statement->bind_param("s", $target_date);
					$statement->execute();
					$result2 = $statement->get_result();
					
					$jsonArray = array();
					while ($row = $result->fetch_assoc()) {
						$jsonArray[$row["status"]][] = array (
							"id" 			=> $row["id"],
							"report_id" 	=> $row["report_id"],
							"category_id"	=> $row["category_id"],
							"location_id"	=> $row["location_id"],
							"created"		=> $row["created"]
						);
					}
					
					while ($row = $result2->fetch_assoc()) {
						$jsonArray[$row["status"]][] = array (
							"id" 			=> $row["id"],
							"report_id" 	=> $row["report_id"],
							"category_id"	=> $row["category_id"],
							"location_id"	=> $row["location_id"],
							"created"		=> $row["created"]
						);
					}
					
					
					header('Content-Type: application/json');
					header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
					echo json_encode($jsonArray, JSON_PRETTY_PRINT);
				} else {
					header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
				}
				break;
			case "archiveReports":
				if (APP::getLogin()->isUserLoggedIn()) {
					$result = APP::getMysqli()->query("SELECT * FROM "._DB_PREFIX."reports WHERE status >= 2 AND isdeleted < 1 ORDER BY id DESC, status DESC");
					$jsonArray = array();
					
					while ($row = $result->fetch_assoc()) {
						$jsonArray[] = array (
							"id" 			=> $row["id"],
							"status" 		=> $row["status"],
							"report_id" 	=> $row["report_id"],
							"category_id"	=> $row["category_id"],
							"location_id"	=> $row["location_id"],
							"created"		=> $row["created"],
							"modified"		=> $row["modified"]
						);
					}
					
					header('Content-Type: application/json');
					header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
					echo json_encode($jsonArray, JSON_PRETTY_PRINT);
				} else {
					header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
				}
				break;
			case "test_getreports":
				if (isset($_GET['report_id']) && $_GET['report_id'] != null) {
					$sql = "SELECT * FROM "._DB_PREFIX."reports WHERE report_id=?";
					$statement = APP::getMysqli()->prepare($sql);
					$statement->bind_param("s", $_GET['report_id']);
					$statement->execute();

					$result = $statement->get_result();
					
					$array = array();
					while($row = $result->fetch_assoc()) {
						$array[] = $row;
					}
					
					echo json_encode($array);
					header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				} else {
					header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
				}
				break;
			case "test_getcontact":
				if (isset($_GET['contact_id']) && $_GET['contact_id'] != null) {
					$sql = "SELECT * FROM "._DB_PREFIX."contacts WHERE id=?";
					$statement = APP::getMysqli()->prepare($sql);
					$statement->bind_param("i", $_GET['contact_id']);
					$statement->execute();

					$result = $statement->get_result();
					
					$array = array();
					while($row = $result->fetch_assoc()) {
						$array[] = $row;
					}
					
					echo json_encode($array);
					header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				} else {
					header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
				}
				break;
			case "test_getpersons":
				if (isset($_GET['report_id']) && $_GET['report_id'] != null) {
					$sql = "SELECT * FROM "._DB_PREFIX."perpetrators WHERE report_id=?";
					$statement = APP::getMysqli()->prepare($sql);
					$statement->bind_param("s", $_GET['report_id']);
					$statement->execute();

					$result = $statement->get_result();
					
					$array = array();
					while($row = $result->fetch_assoc()) {
						$array[] = $row;
					}
					
					echo json_encode($array);
					header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				} else {
					header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
				}
				break;
			case "addPerpetrator":
				if (isset($_POST['person_report_id']) && $_POST['person_report_id'] != null) {
					
					$report_id			= $_POST["person_report_id"];
					$person_name		= isset($_POST["person_name"]) 				? $_POST["person_name"] 			: null;
					$person_sex			= isset($_POST["person_sex"]) 				? $_POST["person_sex"] 				: null;
					$person_skincolor	= isset($_POST["person_skincolor"]) 		? $_POST["person_skincolor"]		: null;
					$person_age			= isset($_POST["person_age"]) 				? $_POST["person_age"] 				: null;
					$person_clothing	= isset($_POST["person_clothing"]) 			? $_POST["person_clothing"] 		: null;
					$person_uniqueprop	= isset($_POST["person_uniqueproperties"]) 	? $_POST["person_uniqueproperties"] : null;
					
					$stmt = APP::getMysqli()->prepare("INSERT INTO "._DB_PREFIX."perpetrators (
						name,
						sex,
						skincolor,
						clothing,
						age,
						uniqueproperties,
						report_id
					) VALUES (?, ?, ?, ?, ?, ?, ?)");
					$stmt->bind_param("siisiss", $person_name, $person_sex, $person_skincolor, $person_clothing, $person_age, $person_uniqueprop, $report_id);
					
					if ($stmt->execute()) {
						$insert_id 		= $stmt->insert_id;
						$perpetrator_id = uniqid("perpetrator_{$insert_id}_");
						
						$stmt2 = APP::getMysqli()->prepare("UPDATE "._DB_PREFIX."perpetrators SET perpetrator_id = ? WHERE id = ?");
						$stmt2->bind_param("si", $perpetrator_id, $insert_id);
						$stmt2->execute();
						
						echo json_encode(array(
							"perpetrator_id" 	=> $perpetrator_id,
							"perpetrator_data"	=> array (
								"name"				=> $person_name,
								"sex"				=> $person_sex,
								"skincolor"			=> $person_skincolor,
								"clothing"			=> $person_clothing,
								"age"				=> $person_age,
								"uniqueproperties"	=> $person_uniqueprop,
								"report_id"			=> $report_id
							)
						));
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
	
}