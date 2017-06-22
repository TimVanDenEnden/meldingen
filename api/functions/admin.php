<?php

class Admin {
	
	public function get($data) {
		switch ($data) {
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
			case "userPermissions":
				if (APP::getLogin()->isUserLoggedIn()) {
					if (isset($_REQUEST["user_id"])) {
						$user_id 	= $_REQUEST["user_id"] == "own" ? $_SESSION['user_id'] : $_REQUEST["user_id"];
						$jsonArray 	= array( //defaults
							"DASHBOARD_CAN_EDIT"	=> 0,
							"DASHBOARD_CAN_REMOVE"	=> 0,
							"ARCHIVE_CAN_VIEW"		=> 0,
							"ARCHIVE_CAN_EDIT"		=> 0,
							"ARCHIVE_CAN_REMOVE"	=> 0,
							"USERS_CAN_VIEW"		=> 0,
							"USERS_CAN_ADD"			=> 0,
							"USERS_CAN_EDIT"		=> 0,
							"USERS_CAN_REMOVE"		=> 0,
							"PAGEBUILDER_USE"		=> 0,
						);
						
						$sql = "SELECT * FROM "._DB_PREFIX."users_permissions WHERE user_id = ?";
						$statement = APP::getMysqli()->prepare($sql);
						$statement->bind_param("i", $user_id);
						$statement->execute();
						$result = $statement->get_result();
						
						while ($row = $result->fetch_assoc()) {
							$jsonArray[$row["permission"]] = $row["value"];
						}
						
						header('Content-Type: application/json');
						header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
						echo json_encode($jsonArray, JSON_PRETTY_PRINT);
					} else {
						header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
					}
				} else {
					header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
				}
				break;
			case "users":
				if (APP::getLogin()->isUserLoggedIn()) {
					$jsonArray 	= array();
					$result = APP::getMysqli()->query("SELECT user_id, user_name, user_email, user_isadmin FROM "._DB_PREFIX."login_users");
					
					while ($row = $result->fetch_assoc()) {
						$jsonArray[$row["user_id"]]["user_name"] 	= $row["user_name"];
						$jsonArray[$row["user_id"]]["user_email"] 	= $row["user_email"];
						$jsonArray[$row["user_id"]]["user_isadmin"] = $row["user_isadmin"];
					}
					
					header('Content-Type: application/json');
					header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
					echo json_encode($jsonArray, JSON_PRETTY_PRINT);
				} else {
					header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
				}
				break;
			case "updateuser":
				if (APP::getLogin()->isUserLoggedIn()) {
					var_dump($_POST);
					if (isset($_POST["updateuser"])) {
						$sql = "SELECT * FROM "._DB_PREFIX."users_permissions WHERE user_id = ?";
						$statement = APP::getMysqli()->prepare($sql);
						$statement->bind_param("i", $_SESSION['user_id']);
						$statement->execute();
						
						foreach ($_POST as $post) {
							if (substr($post, 0, 12 ) === "users_check_") {
								$permission = str_replace("users_check_", "", $post);
								$value = 1;
								
								$sql = "INSERT INTO "._DB_PREFIX."users_permissions (user_id, permission, value) VALUES (?, ?, ?)";
								$statement = APP::getMysqli()->prepare($sql);
								$statement->bind_param("isi", $_SESSION['user_id'], $permission, $value);
								$statement->execute();
							}
						}
						
						header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
					} else {
						header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
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