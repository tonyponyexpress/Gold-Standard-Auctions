<?php
/**
*User soldItem
*how to store an item and tell if it is sold
*
*
*
*@author Tritens
*@package users
*
*/
    session_start();

    // Access database
    include ('../../cms/sql_credentials.php');
    global $mysqli;

    $item = $_POST["item"];
    $description = $_POST["description"];
    $picture = $_POST["picture"];
    $username =  $_SESSION['user_id'];
    $description = str_replace("'", "''", $description);
    // Check if message is not empty
    if (!empty($item) && !empty($description) ){
        // Create post
        $post = "INSERT INTO  Project_Items(name, description, username) VALUES ('$item','$description','$username');";
        if ($post_result = $mysqli->query($post)) {
            echo "New record created successfully";
            header('Location: ../sellTab.php');
        }
        else {
            echo "Error";
        }
    }
    else
    {
        echo "Input is not valid";
    }


    /* close connection */
    $mysqli->close();

?>
