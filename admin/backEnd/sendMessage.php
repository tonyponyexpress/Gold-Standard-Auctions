<?php
/**
*Admin: sendMessage
*This file is in charge of getting the message from the user and storing in the database
*
*
*
*@author Tritens
*@package users
*
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
