<?php
/**
* User settings: change Email
* Changes the user email
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
    $newEmail =  $_POST['newEmail1'];

    $user = "UPDATE Project_Users SET email='$newEmail' WHERE username='$username';";
    if ($user_result = $mysqli->query($user)) {
        echo "Email updated succesfully";
    }
    else {
        echo "Error";
    }

    // close connection
    $mysqli->close();
?>
