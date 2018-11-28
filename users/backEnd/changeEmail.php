<?php
// error_reporting(E_ALL);
// ini_set("display_errors",1);
global $mysqli;
/**
* User settings: change Email
* Changes the user email
*
*
*
*@author Tritens
*@package users
*
*/

    // Access database
    include ('../../cms/sql_credentials.php');
    global $mysqli;
    // Start user session
    session_start();
    // Variables
    $username =  $_SESSION['user_id'];
    $newEmail =  $_POST['newEmail1'];
    $test = "false";

    include('../testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();
    $homeScreen->changeEmail($test,$username, $newEmail);
?>
