<?php
/**
*Admin: sendMessage
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

$stmt = $mysqli->prepare("INSERT INTO Project_Messages (message, username, m_date, admin) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $message, $username, $date, $admin);

// Variables
$message = $_POST["message"];
$username =  $_POST["username"];
$admin = 1;

// Time
date_default_timezone_set("America/Chicago");
$timestamp = time();
$date = date("h:i:s A. M d, Y", $timestamp);

// Check if message is not empty
if ($message != ""){
    // Create post
    //$entry = "INSERT INTO  Project_Messages(message, username) VALUES ('$message','$username');";
    if ($stmt->execute()) {
        header('Location: ../admin_dashboard.php');
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
