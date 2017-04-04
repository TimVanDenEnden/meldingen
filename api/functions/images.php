<?php

class Images {
	
	public function get($id) {
		$pathPreg = preg_replace("/(.*)_(\d{4})(\d{2})(\d{2})(.*)_(.*)/", "$1/$2/$3/$4/$5.$6", $id);
		$path = "/content/images/".$pathPreg;
		
		$size = getimageSize(_ROOT.$path);
		
		header("Content-type: ".$size['mime']);
		readfile(_ROOT.$path);
	}
	
	/*
	public function get($id) {
		$pathPreg = preg_replace("/(.*)_(\d{4})(\d{2})(\d{2})(.*)_(.*)/", "$1/$2/$3/$4/$5.$6", $id);
		$path = "/content/images/".$pathPreg;
		
		//print_r ($path);
		
		if (file_exists(_ROOT.$path) && !is_dir(_ROOT.$path)) {
			if ($this->isImage(_ROOT.$path)) {
				$size = getimageSize(_ROOT.$path);
				
				$url = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
				$url .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);
				
				header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
				//header('Location: '.$url.$path);
				header("Content-type: ".$size['mime']);
				readfile(_ROOT.$path);
				//print_r($path);
			} else {
				header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error");
			}
		} else {
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		}
	}
	*/
	
	private function isImage($path) {
		$size = getimagesize($path);
		$image_type = $size[2];
     
		if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
			return true;
		}
		return false;
	}
	
	/** OLD
	
	public function get($id) {
		$stmt = APP::getMysqli()->prepare("SELECT * FROM "._DB_PREFIX."images WHERE image_id = ?");
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if ($result->num_rows == 1) {
			while ($row = $result->fetch_assoc()) {
				//$path = _ROOT."/content/images/".$row["path"];
				$path = "/content/images/".$row["path"];
				
				if (file_exists(_ROOT.$path) && !is_dir(_ROOT.$path)) {
					if ($this->isImage(_ROOT.$path)) {
						//$size = getimageSize($path);
						
						$url = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
						$url .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);
						
						header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
						header('Location: '.$url.$path);
						//header("Content-type: ".$size['mime']);
						//readfile($path);
					} else {
						header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error");
					}
				} else {
					header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
				}
			}
		} else {
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		}
	}
	
	private function isImage($path) {
		$size = getimagesize($path);
		$image_type = $size[2];
     
		if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
			return true;
		}
		return false;
	}
	
	OLDER
	
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
	
	*/
	
}