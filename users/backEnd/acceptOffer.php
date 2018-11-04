<?php
/**
*accept offers
*This file changes the status of an offer to accepted
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
    $item_id = $_POST['accept'];

    $entry = "UPDATE Project_Items SET status='accepted' WHERE item_id='$item_id';";
    if ($mysqli->query($entry) === TRUE) {
        echo "Offer accepted successfully";
    }
    else {
        echo "Error";
    }

    // close connection
    $mysqli->close();

?>
