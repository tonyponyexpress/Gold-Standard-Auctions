<?php
/**
* User settings: change password
* Changes the user password
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
    $old1 = $_POST['old1'];
    $old2 =  $_POST['old2'];
    $new1 =  $_POST['new1'];
    $new2 = $_POST['new2'];
    $test = "false";

    include('../testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();
    $homeScreen->sendMessage($test, $username, $old1, $old2, $new1, $new2);
?>
