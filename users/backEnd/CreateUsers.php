<?php
/**
    * User Create Users
    *
    * Creates a testSuiteUsers object that calls the function to create a usser by passing the username, password1, password2, first name, last name, email and false for the testSuite.
    *
    * @author Tritens
    * @package user
    */

    $username = $_POST["newUsername"];
    $password = $_POST["newPassword"];
    $password2 = $_POST["newPassword2"];
    $firstName = $_POST["newFirst"];
    $lastName = $_POST["newLast"];
    $email = $_POST["newEmail"];
    $test = "false";

    include('../testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();
    $homeScreen->createUsers($test,$username,$password,$password2,$firstName,$lastName,$email);
?>
