<?php
/**
*User: sendMessage
*This file is in charge of getting the message from the user and storing in the database
*
*
*
*@author Tritens
*@package users
*
*/

    $message = $_POST["message"];
    $username =  $_SESSION['user_id'];
    $test = "false";

    include('../testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();
    $homeScreen->sendMessage($test,$message, $username);
?>
