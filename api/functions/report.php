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
			case "setreportlocation":
				if (isset($_POST['report_id']) && $_POST['report_id'] != null) {
					if (isset($_POST['location_id']) && $_POST['location_id'] != null) {
						
						$report_id		= $_POST['report_id'];
						$location_id	= $_POST['location_id'];
						
						$stmt = APP::getMysqli()->prepare("UPDATE "._DB_PREFIX."reports SET location_id = ? WHERE report_id = ?");
						$stmt->bind_param("is", $location_id, $report_id);
						
						if ($stmt->execute()) {
							header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
						} else {
							header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error");
						}
					} else {
						header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
					}
				} else {
					header($_SERVER["SERVER_PROTOCOL"]." 404 Forbidden");
				}
				break;
			case "currentReport":
				if (isset($_COOKIE["reportID"]) && $_COOKIE["reportID"] != null) {
					$sql = "SELECT * FROM "._DB_PREFIX."reports WHERE report_id=?";
					$statement = APP::getMysqli()->prepare($sql);
					$statement->bind_param("s", $_COOKIE['reportID']);
					$statement->execute();

					$result = $statement->get_result();
					
					$jsonArray = array();
					if ($row = $result->fetch_assoc()) {
						$jsonArray["id"] 				= $row["id"];
						$jsonArray["report_id"] 		= $row["report_id"];
						$jsonArray["category_id"] 		= $row["category_id"];
						$jsonArray["description"] 		= $row["description"];
						$jsonArray["moreinfo"] 			= $row["moreinfo"];
						$jsonArray["unconscious"] 		= $row["unconscious"];
						$jsonArray["victim"] 			= $row["victim"];
						$jsonArray["victimname"] 		= $row["victimname"];
						$jsonArray["weapontype_id"] 	= $row["weapontype_id"];
						$jsonArray["weapontypeother"] 	= $row["weapontypeother"];
						$jsonArray["weaponlocation"] 	= $row["weaponlocation"];
						$jsonArray["fightercount"] 		= $row["fightercount"];
						$jsonArray["isweaponpresent"] 	= $row["isweaponpresent"];
						$jsonArray["drugsaction_id"] 	= $row["drugsaction_id"];
						$jsonArray["stolenobject"] 		= $row["stolenobject"];
						$jsonArray["dateoftheft"] 		= $row["dateoftheft"];
						$jsonArray["contact_id"] 		= $row["contact_id"];
						$jsonArray["location_id"] 		= $row["location_id"];
						
						/*
						*	Contact data
						*/
						
						$jsonArray["contact_data"] 		= array();
						
						if (isset($row["contact_id"]) && $row["contact_id"] != null) {
							$sql2 = "SELECT * FROM "._DB_PREFIX."contacts WHERE id=?";
							$statement2 = APP::getMysqli()->prepare($sql2);
							$statement2->bind_param("i", $row["contact_id"]);
							$statement2->execute();
							$result2 = $statement2->get_result();
							
							if ($row2 = $result2->fetch_assoc()) {
								$jsonArray["contact_data"]["id"] 			= $row2["id"];
								$jsonArray["contact_data"]["name"] 			= $row2["name"];
								$jsonArray["contact_data"]["phonenumber"] 	= $row2["phonenumber"];
								$jsonArray["contact_data"]["emailadress"] 	= $row2["emailadress"];
							}
						}
						
						/*
						*	Perpetrators data
						*/
						
						$jsonArray["perpetrators"] 		= array();
						
						$sql3 = "SELECT * FROM "._DB_PREFIX."perpetrators WHERE report_id=?";
						$statement3 = APP::getMysqli()->prepare($sql3);
						$statement3->bind_param("s", $row["report_id"]);
						$statement3->execute();
						$result3 = $statement3->get_result();
						
						while ($row3 = $result3->fetch_assoc()) {
							$jsonArray["perpetrators"][$row3["perpetrator_id"]] = array(
								"perpetrator_id" 	=> $row3["perpetrator_id"],
								"perpetrator_data"	=> array (
									"name"				=> $row3["name"],
									"sex"				=> $row3["sex"],
									"skincolor"			=> $row3["skincolor"],
									"clothing"			=> $row3["clothing"],
									"age"				=> $row3["age"],
									"uniqueproperties"	=> $row3["uniqueproperties"],
									"report_id"			=> $row3["report_id"]
								)
							);
						}
					}
					
					echo json_encode($jsonArray);
					header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
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
	
	public function postReport() {
		if (isset($_POST["report_id"])) {
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
			
			$report_id			= $_POST["report_id"];
			$description		= isset($_POST["description"]) 		? $_POST["description"] 	: null;
			$moreinfo			= isset($_POST["moreinfo"]) 		? $_POST["moreinfo"] 		: null;
			$fightercount		= isset($_POST["fightercount"]) 	? $_POST["fightercount"] 	: null;
			$weapontype_id		= isset($_POST["weapontype_id"]) 	? $_POST["weapontype_id"] 	: null;
			$weaponlocation		= isset($_POST["weaponlocation"]) 	? $_POST["weaponlocation"] 	: null;
			$weapontypeother	= isset($_POST["weapontypeother"]) 	? $_POST["weapontypeother"] : null;
			$victim				= isset($_POST["victim"]) 			? $_POST["victim"] 			: null;
			$unconscious		= isset($_POST["unconscious"]) 		? $_POST["unconscious"] 	: null;
			$isweaponpresent	= isset($_POST["isweaponpresent"]) 	? $_POST["isweaponpresent"] : null;
			$drugsaction_id		= isset($_POST["drugsaction_id"]) 	? $_POST["drugsaction_id"] 	: null;
			$stolenobject		= isset($_POST["stolenobject"]) 	? $_POST["stolenobject"] 	: null;
			
			$dateoftheft		= isset($_POST["dateoftheft"]) 		? $_POST["dateoftheft"]		: null;
			if ($dateoftheft != null) {
				$dateoftheft = DateTime::createFromFormat('l d F Y - H:i', $dateoftheft);
				$dateoftheft = $dateoftheft->format('Y-m-d H:i:s');			
			}
			//dddd DD MMMM YYYY - HH:mm
			
			$stmt = APP::getMysqli()->prepare("UPDATE "._DB_PREFIX."reports SET 
				description = ?,
				moreinfo = ?,
				fightercount = ?,
				weapontype_id = ?,
				weaponlocation = ?,
				weapontypeother = ?,
				victim = ?,
				unconscious = ?,
				isweaponpresent = ?,
				drugsaction_id = ?,
				dateoftheft = ?,
				stolenobject = ?
				WHERE report_id = ?"
			);
			$stmt->bind_param("sssisssssssss", 
				$description,
				$moreinfo,
				$fightercount,
				$weapontype_id,
				$weaponlocation,
				$weapontypeother,
				$victim,
				$unconscious,
				$isweaponpresent,
				$drugsaction_id,
				$dateoftheft,
				$stolenobject,
				$report_id
			);
			if (!$stmt->execute()) {
				header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error");
				exit;
			}
			
			
			/*
			* UPDATE / SET CONTACT
			*/
			
			$contact_name		= isset($_POST["contact_name"])		? $_POST["contact_name"]	: null;
			$contact_number		= isset($_POST["contact_number"])	? $_POST["contact_number"]	: null;
			$contact_email		= isset($_POST["contact_email"])	? $_POST["contact_email"]	: null;
			
			$stmt = APP::getMysqli()->prepare("SELECT contact_id FROM "._DB_PREFIX."reports WHERE report_id = ?");
			$stmt->bind_param("s", $report_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if ($result->num_rows > 0) {
				if ($row = mysqli_fetch_assoc($result)) {
					if ($row["contact_id"] != null && $row["contact_id"] != "") {
						$stmt2 = APP::getMysqli()->prepare("UPDATE "._DB_PREFIX."contacts SET name = ?, phonenumber = ?, emailadress = ? WHERE id = ?");
						$stmt2->bind_param("sssi", $contact_name, $contact_number, $contact_email, $row["contact_id"]);
						$stmt2->execute();
					} else {
						$stmt2 = APP::getMysqli()->prepare("INSERT INTO "._DB_PREFIX."contacts (name, phonenumber, emailadress) VALUES (?, ?, ?)");
						$stmt2->bind_param("sss", $contact_name, $contact_number, $contact_email);
						
						if ($stmt2->execute()) {
							$contactID = $stmt2->insert_id;
							
							$stmt3 = APP::getMysqli()->prepare("UPDATE "._DB_PREFIX."reports SET contact_id = ? WHERE report_id = ?");
							$stmt3->bind_param("is", $contactID, $report_id);
							$stmt3->execute();
						}
					}
				}
			}
			
			echo json_encode(array("UPDATE SUCCESS"));
			header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
			
			/*
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
			*/
		} else {
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
		}
	}
	
}