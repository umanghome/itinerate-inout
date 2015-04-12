<?php

require("../includes/config.php");

if(!isset($_GET["city"])) {
	render("index.php");
	exit;
}

?>