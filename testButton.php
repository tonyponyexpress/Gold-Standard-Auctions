<?php
    // error_reporting(E_ALL);
    // ini_set("display_errors", 1);
    //
    include('users/testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();

    // Test #1: createUsers
    // 1.1 valid
    $homeScreen->createUsers("true","123","123456789","123456789","firstName","lastName","email@email.com");
    // 1.2 Username already exists
    $homeScreen->createUsers("true","","123456789","123456789","newww","newlast","new@email.com");
    // 1.3

    // Test #2: login
    // 2.1
?>
