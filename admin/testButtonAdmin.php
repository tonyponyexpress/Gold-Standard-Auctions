<?php
    // error_reporting(E_ALL);
    // ini_set("display_errors", 1);
    //
    include('functionsAdmin.php');
    $admin = new functionsAdmin();

    // Test #1: delete_issue
    // 1.1
    // PROBLEM: the first time this function was run, it deleted issue 22. Now when the button
    // is clicked again, it says "22 deleted" but it should say "issue doesn't exist"
    $admin->delete_issue("true",22)

    // Test #2: delete_items
    // 2.1


    // Test #3: delete_user
    // 3.1



?>
