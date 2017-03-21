<?php

$json_url = "http://projecten.dev/meldingen/api/?sys=report&data=location_categories";
$json = @file_get_contents($json_url);
$categoriesJSON = json_decode($json, TRUE);

$json_url = "http://projecten.dev/meldingen/api/?sys=report&data=locations";
$json = @file_get_contents($json_url);
$locationsJSON = json_decode($json, TRUE);

foreach($categoriesJSON as $categories) {
	echo "<h1>".$categories["name"]."</h1>";
	
	foreach($locationsJSON as $location) {
		if ($location["category_id"] == $categories["id"]) {
			echo "<a href=\"".$location["id"]."\">".$location["building"]."</a><br>";
		}
	}
}