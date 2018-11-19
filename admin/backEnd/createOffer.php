<?php

/**
    * createOffer
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
    $item_id = $_POST["item_id"];
    $offer =  $_POST["offer"];

    // Check if message is not empty
    if (!empty($offer)){
        // Create offer
        $entry = "UPDATE Project_Items SET offer='$offer', status='offer' WHERE item_id='$item_id';";
        if ($mysqli->query($entry) === TRUE) {
            header('Location: ../admin_items.php');
            echo "Offer created successfully";
        }
        else {
            echo "Error";
        }
    }
    else
    {
        echo "Input is not valid";
    }

    $mysqli->close();

?>
