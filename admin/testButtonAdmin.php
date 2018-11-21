<?php
    // error_reporting(E_ALL);
    // ini_set("display_errors", 1);
    //
    include('functionsAdmin.php');
    $admin = new functionsAdmin();

    $test="true";

    // Test #1: delete_issue
    echo "<b>#1 Delete Issue Tests: </b><br>";
    // 1.1
    $admin->delete_issue("true",50);
    echo "<br> <br>";


    // Test #2: delete_items
    echo "<br><b>#2 Delete Items Tests: </b><br>";
    // 2.1
    $admin->delete_items("true",123);
    echo "<br> <br>";

    // Test #3: delete_user
    echo "<br><b>#3 Delete Users Tests: </b><br>";
    // 3.1
    $admin->delete_user("true",95);
    echo "<br> <br>";

    // Test #4: login
    echo "<br><b>#4 Login Tests: </b><br>";
    // 4.1 Valid login
    echo "<br> 4.1 Valid login <br>";
    $admin->login($test,"EmiliaPaz","eecs448");
    // 4.2 Invalid login
    echo "<br> 4.1 Invalid login <br>";
    $admin->login($test,"EmiliaPaz","xxxxxxxx");
    echo "<br> <br>";

    // Test #5: login
    echo "<b>#5 Create Offer Tests: </b><br>";
    // 5.1 Valid create offer
    echo "<br> 5.1 Valid create offer <br>";
    $admin->createOffer($test,"1","35.5");
    // 5.2 Valid create offer
    echo "<br> 5.2 Invalid input for create offer (empty) <br>";
    $admin->createOffer($test,"1","");
    echo "<br> 5.2 Invalid input for create offer (string) <br>";
    $admin->createOffer($test,"1","fgieajghw");



?>
