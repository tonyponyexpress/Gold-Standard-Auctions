<?php
/**
    * User Send Message
    *
    * Creates a testSuiteUsers object that calls the function to send message to the admin by passing the username, message and false for the testSuite.
    *
    * @author Tritens
    * @package user
    */

    $message = $_POST["message"];
    $username =  $_SESSION['user_id'];
    $test = "false";

    include('../testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();
    $homeScreen->sendMessage($test,$message, $username);
?>
