<?php
/**
    * User Change Email
    *
    * Creates a testSuiteUsers object that calls the function to create a contact form problem by passing the title, description, email and false for the testSuite.
    *
    * @author Tritens
    * @package user
    */

    $title = $_POST["contactReason"];
    $description = $_POST["description"];
    $email = $_POST["contactEmail"];
    $test = "false";

    include('../testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();
    $homeScreen->contact($test, $title, $description, $email);
?>
