<?php

require("../includes/config.php");

if (!isset($_SESSION["id"])) {
	redirect("login.php");
}
if ($_SERVER["REQUEST_METHOD"] != "POST") {
	render("changepassword.php");
	exit;
}

if (!isset($_POST["old-password"]))
	apologize("You must provide your old password!");
if (!isset($_POST["new-password"]))
	apologize("You must provide a new password!");
if (!isset($_POST["new-password-again"]))
	apologize("You must provide the new password confirmation!");
if ($_POST["new-password"] != $_POST["new-password-again"]) {
	apologize("The passwords do not match!");
}

$arr = array_map("htmlspecialchars", $_POST);
$password = query("SELECT `password` FROM `users` WHERE `id` = ?", $_SESSION["id"]);
print_r($password);
// if (crypt($_password[]))



?>