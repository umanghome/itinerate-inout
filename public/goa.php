<?php

require("../includes/config.php");

if (!isset($_GET["hotel"])) {
	$hotels = query("SELECT `id`, `name` FROM `hotels` WHERE `city_id` = 1");
	// print_r($hotels);
	render("goa-hotel-list.php", ["hotels" => $hotels]);
	exit;
}
$hotelData = query("SELECT * FROM `hotels` WHERE `id` = ?", $_GET["hotel"]);
$hotelData = $hotelData[0];
// print_r($hotelData);
// echo "<br>";
$attractions = query("SELECT * FROM `attractions` WHERE `city_id` = 1 ORDER BY `popularity` DESC");
// print_r($attractions);
render("goa-final.php", ["hotel" => $hotelData, "attractions" => $attractions]);

?>