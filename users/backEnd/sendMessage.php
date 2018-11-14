<?php
/**
*User: sendMessage
*This file is in charge of getting the message from the user and storing in the database
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

// Get username
session_start();

$stmt = $mysqli->prepare("INSERT INTO Project_Messages (message, username) VALUES (?, ?)");
$stmt->bind_param("ss", $message, $username);
// Variables
$message = $_POST["message"];
$username =  $_SESSION['user_id'];

// Check if message is not empty
if ($message != ""){
    // Create post
    //$entry = "INSERT INTO  Project_Messages(message, username) VALUES ('$message','$username');";
    if ($stmt->execute()) {
        header('Location: ../myAccountTab.php');
    }
    else {
        echo "Error";
    }
}
else
{
    echo "Message is empty";
}

// Close database
$stmt->close();
$mysqli->close();

?>
