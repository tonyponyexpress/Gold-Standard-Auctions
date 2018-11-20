<?php
    // error_reporting(E_ALL);
    // ini_set("display_errors", 1);
    //
    include('users/testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();

    // Test #1: createUsers
    // 1.1 valid
    $homeScreen->createUsers("true","1.1","123456789","123456789","First","Last","1.1@email.com");
    // 1.2 Username already exists
    $homeScreen->createUsers("true","1.1","123456789","123456789","First","Last","1.2@email.com");
    // 1.3 First name Empty
    $homeScreen->createUsers("true","1.3","123456789","123456789","","Last","1.3@email.com");
    // 1.4 Last name Empty
    $homeScreen->createUsers("true","1.4","123456789","123456789","First","","1.4@email.com");
    // 1.5 email Empty
    $homeScreen->createUsers("true","1.5","123456789","123456789","First","Last","");
    // 1.6 email not valid email
    $homeScreen->createUsers("true","1.6","123456789","123456789","First","Last","notAnEmail");
    // 1.7 username empty
    $homeScreen->createUsers("true","","123456789","123456789","First","Last","1.7@email.com");
    // 1.8 password Empty
    $homeScreen->createUsers("true","1.8","","123456789","First","Last","1.8@email.com");
    // 1.9 re-enter password Empty
    $homeScreen->createUsers("true","1.9","123456789","","First","Last","1.9@email.com");
    // 1.10 passwords do not match
    $homeScreen->createUsers("true","1.10","123456789","987654321","First","Last","1.10@email.com");


    // Test #2: login
    // 2.1
?>
