<?php
    include('testSuite.php');
    $homeScreen = new TestSuite();
    // createUsers
    $homeScreen->createUsers("true","123","123456789","123456789","firstName","lastName","email@email.com");
    $homeScreen->createUsers("true","","123456789","123456789","newww","newlast","new@email.com");
?>
