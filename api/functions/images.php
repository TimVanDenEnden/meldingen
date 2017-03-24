<?php

class Images {
	
	public function get($id) {
		$stmt = APP::getMysqli()->prepare("SELECT * FROM "._DB_PREFIX."images WHERE id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if ($result->num_rows == 1) {
			while ($row = $result->fetch_assoc()) {
				header("Content-type: ".$row["type"]);
				echo $row["data"];
			}
			header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
		} else {
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		}
	}
	
}