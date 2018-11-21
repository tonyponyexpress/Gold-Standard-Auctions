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
    // PROBLEM: the first time this function was run, it deleted issue 22. Now when the button
    // is clicked again, it says "22 deleted" but it should say "issue doesn't exist"
    $admin->delete_issue("true",22);

    echo "<br> <br>";
    // Test #2: delete_items
    // 2.1

    echo "<br> <br>";

    // Test #3: delete_user
    // 3.1

    // Test #4: login
    echo "<b>#4 Login Tests: </b><br>";
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
    echo "<br> 5.3 Invalid input for create offer (string) <br>";
    $admin->createOffer($test,"1","fgieajghw");



?>
