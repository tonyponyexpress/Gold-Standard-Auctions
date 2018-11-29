<?php
/**
    * Admin Send Message
    *
    * Creates a functionsAdmin object that calls the function to send a message to a user by passing the message, username, date and admin 1.
    *
    * @author Tritens
    * @package admin
    */

    // Variables
    $message = $_POST["message"];
    $username =  $_POST["username"];
    $admin = 1;
    $test = "false";
    // Time
    date_default_timezone_set("America/Chicago");
    $timestamp = time();
    $date = date("h:i:s A. M d, Y", $timestamp);


    include('../functionsAdmin.php');
    $admin = new functionsAdmin();
    $admin->sendMessage($test, $message, $username, $date, $admin);

?>
