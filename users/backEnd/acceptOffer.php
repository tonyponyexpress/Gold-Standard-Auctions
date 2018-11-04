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
    include ('sql_credentials.php');
    global $mysqli;
    $item_id = $_GET['accept'];

    echo $item_id;
    $item = "UPDATE Project_Items SET status='accepted' WHERE item_id='$item_id';";

    if ($mysqli->query($item) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error";
    }
    echo "last";

    // close connection
    $mysqli->close();

?>
