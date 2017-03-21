<?php

//sys=report&data=location_categories

class Report {
	
	public function get($data) {
		switch ($data) {
			case "categories":
				echo "yesy";
				break;
			case "location_categories":
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