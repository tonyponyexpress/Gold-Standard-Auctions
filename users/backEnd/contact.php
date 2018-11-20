<?php
/**
*User CreateUsers
*This file is in charge of creating users and storing them in a databse
*
*
*
*@author Tritens
*@package users
*
*/

    $title = $_POST["contactReason"];
    $description = $_POST["description"];
    $email = $_POST["contactEmail"];
    $test = "false";

    include('../testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();
    $homeScreen->contact($test, $title, $description, $email);
?>
