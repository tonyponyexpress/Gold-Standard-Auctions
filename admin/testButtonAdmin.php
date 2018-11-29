<?php
/**
    * testButtonAdmin
    *
    * Test button for the admin test suit that shows all the test cases for the admin panel
    *
    * @author Tritens
    * @package admin
    */


    include('functionsAdmin.php');
    $admin = new functionsAdmin();

    $test="true";

    echo "<b><u>ADMIN SIDE TESTS</u></b> <br><br>";

    // Test #1: delete_issue
    echo "<b>#1 Delete Issue Tests: </b><br>";
    // 1.1 Valid delete
    echo "<br> 1.1 Valid delete (once the issue is deleted, it will be invalid)<br>";
    $admin->delete_issue($test,1);
    // 1.2 Invalid delete
    echo "<br> 1.2 Invalid delete  <br>";
    $admin->delete_issue($test,50);
    // 1.3 Invalid delete (varchar id)
    echo "<br> 1.3 Invalid delete (varchar) <br>";
    $admin->delete_issue($test,"abc123");
    echo "<br> <br>";


    // Test #2: delete_items
    echo "<br><b>#2 Delete Items Tests: </b><br>";
    // 2.1  Valid delete
    echo "<br> 2.1  Valid delete (once the item is deleted, it will be invalid)<br>";
    $admin->delete_items($test,1);
    // 2.2  Invalid delete
    echo "<br> 2.1 Invalid delete <br>";
    $admin->delete_items($test,123);
    // 2.3 Invalid delete (varchar id)
    echo "<br> 1.3 Invalid delete (varchar) <br>";
    $admin->delete_items($test,"abc123");
    echo "<br> <br>";

    // Test #3: delete_user
    echo "<br><b>#3 Delete Users Tests: </b><br>";
    // 3.1  Valid delete
    echo "<br> 3.1  Valid delete (once the user is deleted, it will be invalid)<br>";
    $admin->delete_user($test,1);
    // 3.2  Valid delete
    echo "<br> 3.1 Invalid delete <br>";
    $admin->delete_user($test,95);
    // 3.3 Invalid delete (varchar id)
    echo "<br> 1.3 Invalid delete (varchar) <br>";
    $admin->delete_user($test,"abc123");
    echo "<br> <br>";

    // Test #4: login
    echo "<br><b>#4 Login Tests: </b><br>";
    // 4.1 Valid login
    echo "<br> 4.1 Valid login <br>";
    $admin->login($test,"EmiliaPaz","eecs448");
    // 4.2 Invalid login
    echo "<br> 4.2 Invalid login <br>";
    $admin->login($test,"EmiliaPaz","xxxxxxxx");
    echo "<br> <br>";

    // Test #5: Create Offer
    echo "<b>#5 Create Offer Tests: </b><br>";
    // 5.1 Valid create offer
    echo "<br> 5.1 Valid create offer <br>";
    $admin->createOffer($test,"1","35.5");
    // 5.2 Invalid create offer (empty)
    echo "<br> 5.2 Invalid input for create offer (empty) <br>";
    $admin->createOffer($test,"1","");
    // 5.3 Invalid create offer (string)
    echo "<br> 5.3 Invalid input for create offer (string) <br>";
    $admin->createOffer($test,"1","fgieajghw");
    echo "<br> <br>";

    // Test #6: Send Message
    echo "<b>#6 Send Message Tests: </b><br>";
    // 6.1 Valid send message
    echo "<br> 6.1 Valid send message <br>";
    $admin->sendMessage($test,"this is a message","test","08:39:05 AM. Nov 19, 2018",1);
    // 6.2 Empty message
    echo "<br> 6.2 Empty message <br>";
    $admin->sendMessage($test,"","test","08:39:05 AM. Nov 19, 2018",1);



?>
