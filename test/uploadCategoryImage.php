<?php

defined("_DB_HOST")				?: define("_DB_HOST",			"stijndevelopment.ga");
defined("_DB_USER")				?: define("_DB_USER",			"API");
defined("_DB_PASSWORD")			?: define("_DB_PASSWORD",		"CPZ5ETttmt8N0uIv");
defined("_DB_DATABASE")			?: define("_DB_DATABASE",		"Meldingen");
defined("_DB_PREFIX")			?: define("_DB_PREFIX",			"Meld_");
$mysqli = new mysqli(_DB_HOST, _DB_USER, _DB_PASSWORD, _DB_DATABASE);


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