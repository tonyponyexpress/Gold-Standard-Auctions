<?php

/**
    * admin_answer_be.php
    *
    *
    *
    * @author Tritens
    * @package admin
    */

    // Access database
    include ('../../cms/sql_credentials.php');


    session_start();
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    // Global database variable
    global $mysqli;

    // Variables
    $message = $_POST["message"];
    $username =  $_POST["username"];

    // Check if message is not empty
    if (!empty($message) && !empty($username) ){
        // Create post
        $entry = "INSERT INTO  Project_Messages(message, username, admin) VALUES ('$message','$username', 1);";
        if ($mysqli->query($entry) === TRUE) {
            echo "New message created successfully";
        }
        else {
            echo "Error";
        }
    }
    else
    {
        echo "Imput is not valid";
    }

    $mysqli->close();

?>
