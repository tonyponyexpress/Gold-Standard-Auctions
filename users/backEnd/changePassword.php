<?php
/**
* User settings: change password
* Changes the user password
*
*
*
*@author Tritens
*@package users
*
*/

    // Access database
    include ('../../cms/sql_credentials.php');
    global $mysqli;
    // Start user session
    session_start();
    // Variables
    $username =  $_SESSION['user_id'];
    $old =  $_POST['old'];
    $new =  $_POST['new1'];



    // close connection
    $mysqli->close();
?>
