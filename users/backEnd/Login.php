<?php
/**
    * User Login
    *
    * Creates a testSuiteUsers object that calls the function to login by passing the username, password and false for the testSuite.
    *
    * @author Tritens
    * @package user
    */

error_reporting(E_ALL);
ini_set("display_errors", 1);

    $username = $_POST["username"];
    $password = $_POST["password"];
    $test = "false";

    include('../testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();
    $homeScreen->login($test,$username,$password);
?>
