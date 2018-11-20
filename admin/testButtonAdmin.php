<?php
    // error_reporting(E_ALL);
    // ini_set("display_errors", 1);
    //
    include('functionsAdmin.php');
    $admin = new functionsAdmin();

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
    $admin->login("true","EmiliaPaz","eecs448");
    // 4.2 Invalid login
    echo "<br> 4.1 Invalid login <br>";
    $admin->login("true","EmiliaPaz","xxxxxxxxxx");




?>
