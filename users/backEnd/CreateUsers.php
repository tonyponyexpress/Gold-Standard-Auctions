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
