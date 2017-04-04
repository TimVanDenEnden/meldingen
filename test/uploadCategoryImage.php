<?php

defined("_DB_HOST")				?: define("_DB_HOST",			"stijndevelopment.ga");
defined("_DB_USER")				?: define("_DB_USER",			"API");
defined("_DB_PASSWORD")			?: define("_DB_PASSWORD",		"CPZ5ETttmt8N0uIv");
defined("_DB_DATABASE")			?: define("_DB_DATABASE",		"Meldingen");
defined("_DB_PREFIX")			?: define("_DB_PREFIX",			"Meld_");

defined("_ROOT")				?: define("_ROOT",				realpath(dirname(dirname(__FILE__)))."/api");

$mysqli = new mysqli(_DB_HOST, _DB_USER, _DB_PASSWORD, _DB_DATABASE);


if(count($_FILES) > 0) {
	if(is_uploaded_file($_FILES['uploadImage']['tmp_name']) && isset($_REQUEST["sys"])) {
		if (!($_REQUEST["sys"] == "report" || $_REQUEST["sys"] == "system")) {
			return;
		}
		
		$target_dir		= _ROOT."/content/images/";
		$file			= basename($_FILES["uploadImage"]["name"]);
		//$image_name		= getImageName(pathinfo($file, PATHINFO_FILENAME));
		
		$sys 			= $_REQUEST["sys"];
		$year 			= date("Y");
		$month 			= date("m");
		$day 			= date("t");
		$hour			= date("H");
		$minutes		= date("i");
		$seconds		= date("s");
		$microseconds	= date("u");
		
		$path			= $sys."/".$year."/".$month."/".$day;
		$image_id		= uniqid($year.$month.$day.$hour.$minutes.$seconds.$microseconds);
		$image_path_id	= $sys."_".$year.$month.$day.$image_id."_".pathinfo($file, PATHINFO_EXTENSION);
		$target_path	= $path."/".$image_id.".".pathinfo($file, PATHINFO_EXTENSION);
		$target_file	= $target_dir.$target_path;
		$imageFileType	= getimageSize($_FILES['uploadImage']['tmp_name'])[2];
		
		$check = getimagesize($_FILES["uploadImage"]["tmp_name"]);
		if($check !== false) {
			if (!file_exists($target_file)) {
				if ($_FILES["uploadImage"]["size"] > 500000) {
					header($_SERVER["SERVER_PROTOCOL"]." 413 Payload Too Large");
				} else {
					if(isImage($imageFileType)) {
						if (!file_exists($target_dir.$path)) {
							mkdir($target_dir.$path, 0777, true);
						}

						if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $target_file)) {
							$image_id	= uniqid(date("YmtHisu"));
							
							echo $image_path_id."<br><br>";
							
							header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
						} else {
							header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error");
						}
					} else {
						header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
					}
				}
			}
		} else {
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
		}
	}
}

function isImage($image_type) { 
	if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
		return true;
	}
	return false;
}

function clean($string) {
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	
	return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

function getImageName($filename) {
	date_default_timezone_set('Europe/Amsterdam');

	$name = clean($filename);
	$name = date("Ymt_His")."_".substr($name, 0, 100)."_";

	return uniqid($name);
}

?>

<html>
	<body> 
		<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
			<label>Upload Image File:</label><br/>
			<input name="uploadImage" type="file" class="inputFile" />
			<input type="submit" value="Submit" class="btnSubmit" />
		</form>
	</body>
</html>

<?php

/* OLD

if(count($_FILES) > 0) {
	if(is_uploaded_file($_FILES['uploadImage']['tmp_name'])) {		
		$type = getimageSize($_FILES['uploadImage']['tmp_name'])['mime'];
		$data = file_get_contents($_FILES['uploadImage']['tmp_name']);
		
		$stmt = $mysqli->prepare("INSERT INTO "._DB_PREFIX."images (type, data) VALUES (?, ?)");
		$stmt->bind_param("ss", $type, $data);
		$stmt->execute();
	}
}
?>

<html>
	<body> 
		<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
			<label>Upload Image File:</label><br/>
			<input name="uploadImage" type="file" class="inputFile" />
			<input type="submit" value="Submit" class="btnSubmit" />
		</form>
	</body>
</html>

*/

?>