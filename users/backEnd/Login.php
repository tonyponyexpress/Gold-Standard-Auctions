<?php
/**
*User Login
*Basic functionality of how user login works
*
*
*
*@author Tritens
*@package users
*
*/


    $username = $_POST["username"];
    $password = $_POST["password"];
    $test = "false";

    include('../testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();
    $homeScreen->login($test,$username,$password);
?>
