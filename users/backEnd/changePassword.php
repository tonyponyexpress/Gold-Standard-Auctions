<?php
/**
    * User Change Password
    *
    * Creates a testSuiteUsers object that calls the function to change password by passing the user id, old password 1, old password 2, new password 1, new passoword 2 and false for the testSuite.
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
    $old1 = $_POST['old1'];
    $old2 =  $_POST['old2'];
    $new1 =  $_POST['new1'];
    $new2 = $_POST['new2'];
    $test = "false";

    include('../testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();
    $homeScreen->sendMessage($test, $username, $old1, $old2, $new1, $new2);
?>