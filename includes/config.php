<?php

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    require("functions.php");

    // enable sessions
    session_start();

  /*  // require authentication for most pages
    if (!preg_match("{(?:login|logout|register|sell)\.php$}", $_SERVER["PHP_SELF"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("login.php");
        }
    } */

    // require authentication for most pages
/*    if (preg_match("{(?:index|)\.php$}", $_SERVER["PHP_SELF"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("login.php");
        }
    }

    if (preg_match("{(?:login)\.php$}", $_SERVER["PHP_SELF"]))
    {
        if (!empty($_SESSION["id"]))
        {
            redirect("index.php");
        }
    } */

?>
