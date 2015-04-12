<?php

require('../includes/config.php');

if (!isset($_SESSION["id"])) {
	redirect("login.php");
} else {
	render("index.php");
}



?>