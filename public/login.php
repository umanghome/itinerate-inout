<?php

require('../includes/config.php');

if (isset($_SESSION["id"])) {
	render("index.php");
	exit;
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
	render("login.php");
	exit;
} else {

if (!isset($_POST["email"]))
	apologize("You must provide an email!");
if (!isset($_POST["password"]))
	apologize("You must provide a password!");

$arr = array_map("htmlspecialchars", $_POST);

$getUser = query("SELECT `id`, `email`, `password` FROM `users` WHERE `email` = ?", $arr["email"]);
if ($getUser === false) {
	apologize("Could not find any account registered with this email!");
	exit;
}
$getUser = $getUser[0];

if (!(crypt($arr["password"], $getUser["password"]) == $getUser["password"])) {
	apologize("Password incorrect.");
	exit;
}
$_SESSION["id"] = $getUser["id"];

// echo $id;

redirect("index.php");

}
?>