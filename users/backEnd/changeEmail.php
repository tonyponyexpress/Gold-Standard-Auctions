<?php
/**
    * User Change Email
    *
    * Creates a testSuiteUsers object that calls the function to change email by passing the user id, new email and false for the testSuite.
    *
    * @author Tritens
    * @package user
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
