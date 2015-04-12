<?php

require('../includes/config.php');

if (isset($_SESSION["id"])) {
	redirect("index.php");
	exit;
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
	render("signup.php");
	exit;
} else {

if (!isset($_POST["first-name"]))
	apologize("You must provide a first name!");
if (!isset($_POST["last-name"]))
	apologize("You must provide a last name!");
if (!isset($_POST["email"]))
	apologize("You must provide an email!");
if (!isset($_POST["password"]))
	apologize("You must provide a password!");
if (!($_POST["password"] == $_POST["password-again"]))
	apologize("The passwords must be correct!");
}

$arr = array_map("htmlspecialchars", $_POST);

$register = query("INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`) VALUES (?, ?, ?, ?)", $arr["email"], crypt($arr["password"]), $arr["first-name"], $arr["last-name"]);
// $rows = query("SELECT LAST_INSERT_ID() AS id");
// $id = $rows[0]["id"];

// echo $id;

redirect("login.php");

?>